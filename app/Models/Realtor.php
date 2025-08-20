<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Realtor extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'firstname',
        'lastname',
        'phone',
        'email',
        'address',
        'password',
        'account_name',
        'account_number',
        'bank_name',
        'referral_link',
        'upline_referral',
        'commission',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Accessor for full name
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }
}
