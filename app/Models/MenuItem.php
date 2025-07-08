<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
 
class MenuItem extends Model
{
    use HasFactory; 
    protected $fillable = ['name','slug'];

    
    public function dropdownItems()
    {
        return $this->hasMany(DropdownItem::class)->whereNull('parent_id'); 
    }

    public function allDropdownItems()
    {
        return $this->hasMany(DropdownItem::class)->with('allChildren');
    }
    
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
