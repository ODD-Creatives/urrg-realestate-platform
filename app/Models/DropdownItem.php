<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DropdownItem extends Model
{
    use HasFactory;

    protected $fillable = ['menu_item_id', 'parent_id', 'name', 'slug'];


    // Define relationship to MenuItem 
    public function menuItem()
    { 
        return $this->belongsTo(MenuItem::class);
    }

    public function children()
    {
        return $this->hasMany(DropdownItem::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(DropdownItem::class, 'parent_id');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
