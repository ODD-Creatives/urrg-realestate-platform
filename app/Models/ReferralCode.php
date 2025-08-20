<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralCode extends Model
{
    use HasFactory;
    protected $table = "generate_codes";

    protected $fillable = [
        'user_id',
        'code', 
        'referral_code',
        'uses', 
        'max_uses',
        'expires_at'
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    } 

    

    public function referrals()
    {
        return $this->hasMany(ReferralTracking::class);
    }

    public function isExpired()
    {
        return $this->expires_at && now()->gte($this->expires_at);
    } 

    public function hasAvailableUses()
    {
        return is_null($this->max_uses) || $this->uses < $this->max_uses;
    }

    public function isValid()
    {
        return !$this->isExpired() && $this->hasAvailableUses();
    }

    public function referredAdmins()
    {
        return $this->hasOne(Admin::class, 'referral_code', 'referral_code');
    }
}