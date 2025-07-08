<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MenuItem;
use App\Models\DropdownItem;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a top-level menu item
        $menuItem = MenuItem::create([
            'name' => 'Services',
        ]);

        // Top-level dropdowns under "Services"
        $webDev = DropdownItem::create([
            'menu_item_id' => $menuItem->id,
            'name' => 'Web Development',
        ]);

         $mobileDev = DropdownItem::create([
            'menu_item_id' => $menuItem->id,
            'name' => 'Mobile Development',
        ]);

        // Sub-items under "Web Development"
        DropdownItem::create([
            'menu_item_id' => $menuItem->id,
            'parent_id' => $webDev->id,
            'name' => 'Laravel',
        ]);

        DropdownItem::create([
            'menu_item_id' => $menuItem->id,
            'parent_id' => $webDev->id,
            'name' => 'Vue.js',
        ]);

        // Sub-items under "Mobile Development"
        DropdownItem::create([
            'menu_item_id' => $menuItem->id,
            'parent_id' => $mobileDev->id,
            'name' => 'Flutter',
        ]);

        DropdownItem::create([
            'menu_item_id' => $menuItem->id,
            'parent_id' => $mobileDev->id,
            'name' => 'React Native',
        ]);
    }
}
