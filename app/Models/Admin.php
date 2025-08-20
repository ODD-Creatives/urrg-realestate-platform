<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    
    protected $fillable = [
        'username',
        'referral_code',
        'email',
        'password',
        'status',
        'name',
        'phone',
        'profile_photo',
        'bank_name',
        'account_name',
        'account_number',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function referralCode()
    { 
        return $this->hasOne(ReferralCode::class, 'user_id');
    }

    public function referredAdmins()
    { 
        return $this->hasOne(Admin::class, 'referral_code', 'referral_code');
    }

}
