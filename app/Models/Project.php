<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'developer_id',
        'title',
        'description',
        'location',
        'status',
        'cover_image',
        'number_of_units',
        'price_per_unit',
        'documents_path',
    ];

    // Relationships
    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}

