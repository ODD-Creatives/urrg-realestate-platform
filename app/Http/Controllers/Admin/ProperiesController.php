<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProperiesController extends Controller
{
    public function index()
    {
        $properties = Property::latest()->get();
        return view('admin.pages.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('admin.pages.properties.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'date' => 'nullable|date',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Ensure the directory exists
            $destinationPath = public_path('property_images');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            // Save relative path to DB
            $data['image'] = 'property_images/' . $filename;
        }

        Property::create($data);

        return redirect()->route('admin.properties.index')->with('success', 'Property created successfully.');
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('admin.pages.properties.edit', compact('property'));
    }

    public function update($id)
    {
        $property = Property::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'date' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            
            if ($property->image) {
                $imagePath = public_path('property_images/' . basename($property->image));
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            

            // Store new image
            $data['image'] = $request->file('image')->store('property_images', 'public');
        }

        $property->update($data);

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }
    
    public function destroy($id)
    {
        $property = Property::findOrFail($id);

        // Delete image from storage
        if ($property->image) {
            $imagePath = public_path('property_images/' . basename($property->image));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $property->delete();

        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
