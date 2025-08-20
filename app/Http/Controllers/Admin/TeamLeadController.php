<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamLead;

class TeamLeadController extends Controller
{
    public function index()
    {
        $teamLeads = TeamLead::latest()->get();
        return view('admin.pages.teamLeads.index', compact('teamLeads'));
    }

    public function create()
    {
        return view('admin.pages.teamLeads.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'post'     => 'required|string|max:255',
            'picture'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('team_leads', 'public');
        }

        TeamLead::create($validated);

        return redirect()->route('admin.teamLeads.index')->with('success', 'Team lead added successfully.');
    }

    public function edit(TeamLead $teamLead)
    {
        
        return view('admin.pages.teamLeads.edit', compact('teamLead'));
    }

    public function update(Request $request, TeamLead $teamLead)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'post'     => 'required|string|max:255',
            'picture'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('picture')) {
            if ($teamLead->picture && file_exists(public_path('storage/'.$teamLead->picture))) {
                unlink(public_path('storage/'.$teamLead->picture));
            }
            $validated['picture'] = $request->file('picture')->store('team_leads', 'public');
        }

        $teamLead->update($validated);

        return redirect()->route('admin.teamLeads.index')->with('success', 'Team lead updated successfully.');
    }

    public function destroy(TeamLead $teamLead)
    {
        if ($teamLead->picture && file_exists(public_path('storage/'.$teamLead->picture))) {
            unlink(public_path('storage/'.$teamLead->picture));
        }
        $teamLead->delete();

        return redirect()->route('admin.teamLeads.index')->with('success', 'Team lead deleted successfully.');
    }
}
