<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\DropdownItem; 
use Illuminate\Support\Str;
use App\Http\Traits\AdminTrait;
 
class MenuController extends Controller
{
    use AdminTrait;

    public function create(){
        return view('admin.pages.menu.create');
    }

    public function index(){
        $menuItems = MenuItem::with('dropdownItems')->get();
        return view('admin.pages.menu.index', compact('menuItems'));
    }

    public function store(Request $request){
        $this->validateMenu($request); 
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:menu_items,name',
            'items' => 'nullable|array',
            'items.*.name' => 'required_with:items|string|max:255', 
            'items.*.sub_items' => 'nullable|array', 
            'items.*.sub_items.*' => 'required_with:items.*.sub_items|string|max:255',
        ]);
        $menuItem = MenuItem::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);
        // 3. Process nested items if present
        if (!empty($validated['items'])) {
            foreach ($validated['items'] as $itemData) {
                if (!empty($itemData['name'])) {
                    $dropdownItem = DropdownItem::create([
                        'menu_item_id' => $menuItem->id,
                        'parent_id' => null,
                        'name' => $itemData['name'],
                        'slug' => Str::slug($itemData['name']), 
                    ]);

                    if (!empty($itemData['sub_items'])) {
                        foreach ($itemData['sub_items'] as $subItemName) {
                            if (!empty($subItemName)) {
                                DropdownItem::create([
                                    'menu_item_id' => $menuItem->id, 
                                    'parent_id' => $dropdownItem->id, 
                                    'name' => $subItemName,
                                    'slug' => Str::slug($subItemName),
                                ]);
                            }
                        }
                    }
                }
            }
        }
        
        return redirect()->route('admin.menu.create')->with('success', 'Menu item created successfully!');
    }

    public function edit($id)
    {
        $menuItem = MenuItem::with('dropdownItems.children')->findOrFail(decrypt($id));
        
        return view('admin.pages.menu.edit', compact('menuItem'));
    }

    public function update(Request $request, $id)
    {
        $menuItem = MenuItem::findOrFail(decrypt($id)); 

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:menu_items,name,' . $menuItem->id,
            'items' => 'nullable|array',
            'items.*.name' => 'required_with:items|string|max:255',
            'items.*.sub_items' => 'nullable|array',
            'items.*.sub_items.*' => 'required_with:items.*.sub_items|string|max:255',
        ]);

        $menuItem->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        $existingDropdownIds = $menuItem->dropdownItems()->pluck('id');
        if ($existingDropdownIds->isNotEmpty()) {
            DropdownItem::whereIn('id', $existingDropdownIds)->delete();
        }
       
        if (!empty($validated['items'])) {
             foreach ($validated['items'] as $itemData) {
                if (!empty($itemData['name'])) {
                    $dropdownItem = DropdownItem::create([
                        'menu_item_id' => $menuItem->id,
                        'parent_id' => null,
                        'name' => $itemData['name'],
                        'slug' => Str::slug($itemData['name']),
                    ]);

                    // Process sub-items
                    if (!empty($itemData['sub_items'])) {
                        foreach ($itemData['sub_items'] as $subItemName) {
                            if (!empty($subItemName)) {
                                DropdownItem::create([
                                    'menu_item_id' => $menuItem->id,
                                    'parent_id' => $dropdownItem->id,
                                    'name' => $subItemName,
                                    'slug' => Str::slug($subItemName),
                                ]);
                            }
                        }
                    }
                }
            }
        }

        return redirect()->route('admin.menu.edit', encrypt($menuItem->id))->with('success', 'Menu item and structure updated successfully!');
    }
    
    public function destroy($id)
    {
        $menuItem = MenuItem::findOrFail(decrypt($id));

        $menuItem->delete();

        return redirect()->route('admin.menu.index')->with('success', 'Menu item and all its dropdowns deleted successfully!');
    }

}
