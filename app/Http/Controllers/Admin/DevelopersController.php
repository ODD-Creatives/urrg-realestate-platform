<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Developer;

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
    public function show(Developer $developer)
    {
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
