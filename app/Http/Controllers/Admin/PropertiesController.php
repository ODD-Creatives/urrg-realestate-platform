<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Developer;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PropertiesController extends Controller
{
    public function index()
    {
        $properties = Property::with('developer')->latest()->paginate(20);
        return view('admin.pages.properties.index', compact('properties'));
    }

    public function create()
    {
        $developers = Developer::all();
        return view('admin.pages.properties.create', compact('developers'));
    }

    public function store(Request $request)
    {
      
        $validated = $request->validate([
            'developer_id' => 'required|exists:developers,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|in:house,land,apartment',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'toilets' => 'nullable|integer',
            'size' => 'nullable|string',
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'image3' => 'nullable|image',
            'image4' => 'nullable|image',
            'image5' => 'nullable|image',
        ]);
        
        // Generate unique property code (PROP + date + serial)
        $dateCode = Carbon::now()->format('dmy');
        $count = Property::whereDate('created_at', now())->count() + 1;
        $propertyCode = 'PROP' . $dateCode . str_pad($count, 2, '0', STR_PAD_LEFT);
        $validated['property_code'] = $propertyCode;
       
        // Handle image uploads
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile("image$i")) {
                $file = $request->file("image$i");
                $filename = uniqid("property_") . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/uploads/property_images'), $filename);
                $validated["image$i"] = "assets/uploads/property_images/" . $filename;
            }
        }

        Property::create($validated);

        return redirect()->route('admin.properties.index')->with('success', 'Property created successfully.');
    }

    public function show(Property $property)
    {
        $property->load('developer'); // eager load relations
        return view('admin.pages.properties.view', compact('property'));
    }

    public function edit(Property $property)
    {
        $developers = Developer::all();
        return view('admin.pages.properties.edit', compact('property', 'developers'));
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'developer_id' => 'required|exists:developers,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|in:house,land,apartment',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'toilets' => 'nullable|integer',
            'size' => 'nullable|string',
            'status' => 'required|in:pending,approved,rejected,sold',
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'image3' => 'nullable|image',
            'image4' => 'nullable|image',
            'image5' => 'nullable|image',
        ]);

        //dd($request);

        // Handle image updates
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile("image$i")) {
                $file = $request->file("image$i");
                $filename = uniqid("property_") . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/uploads/property_images'), $filename);
                $validated["image$i"] = "assets/uploads/property_images/" . $filename;
            }
        }

        $property->update($validated);

        return redirect()->route('admin.properties.index')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->back()->with('success', 'Property deleted.');
    }
}
