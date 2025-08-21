<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    protected $fillable = ['user_id', 'user_email', 'referral_id', 'referral_code', 'amount', 'level', 'sold_properties', 'status'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    } 

    public function referral() 
    {
        return $this->belongsTo(User::class, 'referral_id');
    }

    public function referralCode()
    {
        return $this->belongsTo(User::class, 'referral_id');
    }

    public function admin() 
    {
        return $this->belongsTo(Admin::class, 'user_id');
    } 

}