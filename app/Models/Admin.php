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
        'email',
        'password',
        'status',
    ]; 

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function referralCode()
    {
        return $this->hasOne(ReferralCode::class, 'user_id');
    }

}
