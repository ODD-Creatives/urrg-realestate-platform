<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    
    protected $fillable = [
        'company_name',
        'contact_person',
        'phone',
        'email',
        'subject', 
        'email_verified_at',
        'letter_of_intent_path',
        'company_profile_path',
        'property_details_path',
        'status', 
    ];

    
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }
}
