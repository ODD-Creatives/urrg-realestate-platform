<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'firstname', 'lastname', 'name', 'email', 'phone',
        'state_of_residence', 'referral_code', 'experience',
        'password', 'status', 'dob', 'address', 'bank_name',
        'account_name', 'account_number', 'payment_method',
        'photo', 'upline_referral'
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relationships
    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function earnedCommissions()
    {
        return $this->hasMany(Commission::class, 'user_id');
    }

    public function paidCommissions()
    {
        return $this->hasMany(Commission::class, 'referral_id');
    }

    public function referrals()
    {
        return $this->hasMany(User::class, 'upline_referral', 'referral_code');
    }

    public function referrer()
    {
        return $this->belongsTo(User::class, 'upline_referral', 'referral_code');
    }

    public function activeReferrals()
    {
        return $this->referrals()->where('status', 'active');
    }

    public function inactiveReferrals()
    {
        return $this->referrals()->where('status', 'inactive');
    }

    // Helpers
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function getTotalEarnedAttribute()
    {
        return $this->earnedCommissions()->sum('amount');
    }

    public function getCommissionByLevel($level)
    {
        return $this->earnedCommissions()
            ->where('level', $level)
            ->sum('amount');
    }

    public function getReferralsByLevel($level)
    {
        return $this->referrals()
            ->whereHas('paidCommissions', fn($q) => $q->where('level', $level))
            ->get();
    }

    public function downlineTree($levels = 3)
    {
        $tree = [];
        $currentLevel = [$this];
        
        for ($i = 1; $i <= $levels; $i++) {
            $nextLevel = [];
            foreach ($currentLevel as $user) {
                $referrals = $user->referrals;
                $nextLevel = array_merge($nextLevel, $referrals->all());
            }
            if (empty($nextLevel)) break;
            $tree[$i] = collect($nextLevel);
            $currentLevel = $nextLevel;
        }
        return $tree;
    }
}