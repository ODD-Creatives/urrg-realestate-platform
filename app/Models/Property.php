<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'developer_id',
        'property_code',
        'title',
        'description',
        'location',
        'price',
        'category',
        'bedrooms',
        'bathrooms',
        'toilets',
        'size',
        'status',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
    ];

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    
}
