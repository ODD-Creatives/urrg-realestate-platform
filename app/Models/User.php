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
        'firstname', 'lastname', 'name', 'referrer_id', 'email', 'phone',
        'state_of_residence', 'referral_code', 'realtor_id', 'experience',
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

    public function commissions()
    {
        return $this->hasMany(Commission::class, 'user_id');
    }

    /**
     * Get only paid commissions.
     */
    // public function paidUserCommissions()
    // {
    //     return $this->hasMany(Commission::class, 'user_id')->where('status', 'paid');
    // }
 
    public function paidCommissions()
    {
        return $this->hasMany(Commission::class, 'referral_id');
    }

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('M d, Y'); 
    }  

    public function referrals()
    {
        return $this->hasMany(User::class, 'upline_referral', 'referral_code');
    }

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id'); 
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
        $tree = [
            'self' => $this,
            'children' => []
        ];

        $currentGeneration = $this->referrals()->with(['wallet', 'paidCommissions'])->get();
        
        if ($levels >= 1 && $currentGeneration->count() > 0) {
            foreach ($currentGeneration as $child) {
                $grandchildren = collect([]);
                
                if ($levels >= 2) {
                    $grandchildren = $child->referrals()->with(['wallet', 'paidCommissions'])->get();
                }
                
                $tree['children'][] = [
                    'child' => $child,
                    'grandchildren' => $grandchildren->map(function ($grandchild) use ($levels) {
                        $greatGrandchildren = collect([]);
                        
                        if ($levels >= 3) {
                            $greatGrandchildren = $grandchild->referrals()->with(['wallet', 'paidCommissions'])->get();
                        }
                        
                        return [
                            'grandchild' => $grandchild,
                            'great_grandchildren' => $greatGrandchildren
                        ];
                    })
                ];
            }
        }

        return $tree;
    }

   


    public function getDownlinesCountByLevelAttribute()
    {
        $tree = $this->downlineTree();
        
        $direct = count($tree['children']);
        $grandchildren = 0;
        $greatGrandchildren = 0;

        foreach ($tree['children'] as $child) {
            $grandchildren += count($child['grandchildren']);
            foreach ($child['grandchildren'] as $grandchild) {
                $greatGrandchildren += count($grandchild['great_grandchildren']);
            }
        }

        return [
            'direct' => $direct,
            'grandchildren' => $grandchildren,
            'great_grandchildren' => $greatGrandchildren,
            'total' => $direct + $grandchildren + $greatGrandchildren,
        ];
    }

    public function isActive()
    {
        return $this->status === 'active';
    }

    public function deactivate()
    {
        $this->update(['status' => 'inactive']);
        return $this;
    }

    public function activate()
    {
        $this->update(['status' => 'active']);
        return $this;
    }

    public function bankDetails()
    {
        return $this->hasOne(BankDetail::class);
    }

    // In User.php model
    public function incrementSoldProperties()
    {
        return $this->increment('sold_properties');
    }

    public function getSoldPropertiesCountAttribute()
    {
        return $this->sold_properties;
    }

    public function resetSoldProperties()
    {
        return $this->update(['sold_properties' => 0]);
    }
}