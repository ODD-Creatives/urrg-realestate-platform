<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Developer;
use App\Models\Property;
use App\Models\Project;


class DevelopersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = Developer::latest()->get();
        return view('admin.pages.developers.index', compact('developers'));
    } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $developer = Developer::findOrFail(decrypt($id));
        return view('admin.pages.developers.view', compact('developer'));
    }

    public function edit(string $id)
    {
        $developer = Developer::findOrFail(decrypt($id));
        return view('admin.pages.developers.edit', compact('developer'));
    }

    public function updateStatus(Request $request, Developer $developer)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);
        
        $developer->update([
            'status' => $request->status,
            // You might want to add other fields like 'approved_by', 'approved_at', etc.
        ]);
        
        return redirect()->back()->with('success', 'Developer status updated successfully');
    }

    public function update(Request $request, string $id)
    {
        
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email',
            'company_description' => 'nullable|string',
            'status' => 'required|in:approved,pending,rejected',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $developer = Developer::findOrFail(decrypt($id));
        
        if ($request->hasFile('logo')) {
            
            $logo = $request->file('logo');
            $filename = uniqid('logo_') . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('assets/uploads/developer_logo'), $filename);
            $validated['logo'] = 'assets/uploads/developer_logo/' . $filename;

        }

        $developer->update($validated);

        return redirect()->route('admin.developers.view',  encrypt($developer->id))->with('success', 'Developer updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */

    
    public function developerProperties(string $developer_id)
    {
        $developer = Developer::findOrFail(decrypt($developer_id));
        $properties = Property::where('developer_id', $developer->id)->latest()->get();

        return view('admin.pages.developers.listings', compact('developer', 'properties'));
    }
    public function developerProjects(string $developerId)
    {
        $developer = Developer::findOrFail(decrypt($developerId));
        $projects = Project::where('developer_id', $developer->id)->latest()->get(); 

        return view('admin.pages.developers.projects', compact('developer', 'projects'));
    }


    public function destroy(string $id)
    {
        //
    }
}
