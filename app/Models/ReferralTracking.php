<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralTracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'referral_code_id',
        'referred_user_id',
        'commission_earned',
        'completed_at'
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    public function referralCode()
    {
        return $this->belongsTo(ReferralCode::class);
    }

    public function referredUser()
    {
        return $this->belongsTo(User::class, 'referred_user_id');
    }

    public function uplineUser()
    {
        return $this->hasOneThrough(
            User::class,
            ReferralCode::class,
            'id',
            'id',
            'referral_code_id',
            'user_id'
        );
    }
}