<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $fillable = ['user_id', 'user_email', 'referral_id', 'amount', 'level', 'status'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function referral()
    {
        return $this->belongsTo(User::class, 'referral_id');
    }
}