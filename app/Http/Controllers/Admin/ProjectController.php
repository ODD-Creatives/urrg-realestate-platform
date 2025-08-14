<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Developer;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('developer')->latest()->get();
        return view('admin.pages.projects.index', compact('projects'));
    }

    public function create()
    {
        $developers = Developer::all();
        return view('admin.pages.projects.create', compact('developers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'developer_id' => 'required|exists:developers,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'status' => 'required|in:upcoming,ongoing,completed',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'documents_path' => 'nullable|file|mimes:pdf,doc,docx|max:4096',
            'number_of_units' => 'nullable|integer',
            'price_per_unit' => 'nullable|numeric',
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('projects/images', 'public');
        }

        if ($request->hasFile('documents_path')) {
            $validated['documents_path'] = $request->file('documents_path')->store('projects/docs', 'public');
        }

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        $project->load('developer');
        return view('admin.pages.projects.view', compact('project'));
    }

    public function edit(Project $project)
    {
        $developers = Developer::all();
        return view('admin.pages.projects.edit', compact('project', 'developers'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'developer_id' => 'required|exists:developers,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'status' => 'required|in:upcoming,ongoing,completed',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'documents_path' => 'nullable|file|mimes:pdf,doc,docx|max:4096',
            'number_of_units' => 'nullable|integer',
            'price_per_unit' => 'nullable|numeric',
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('projects/images', 'public');
        }

        if ($request->hasFile('documents_path')) {
            $validated['documents_path'] = $request->file('documents_path')->store('projects/docs', 'public');
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    
    public function destroy(Project $project)
    {
        // Delete cover image if exists
        if ($project->cover_image && \Storage::disk('public')->exists($project->cover_image)) {
            \Storage::disk('public')->delete($project->cover_image);
        }

        // Delete project document if exists
        if ($project->documents_path && \Storage::disk('public')->exists($project->documents_path)) {
            \Storage::disk('public')->delete($project->documents_path);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }

    
}
