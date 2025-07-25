<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'firstname',
        'lastname', 
        'name',
        'email',
        'phone',
        'state_of_residence',
        'referral_code',
        'experience',
        'password', 
        'status',
        'dob', 'address', 
        'bank_name', 'account_name', 'account_number', 'payment_method',
        'photo',
        'upline_referral',
    ];
 
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hasVerifiedEmail()
    {
        return !is_null($this->email_verified_at);
    }

    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function getFormattedCreatedAtAttribute()
    {
        if (!$this->created_at) {
            return null;
        }
        
        return $this->created_at->format('jS \o\f F, Y');
    }

   public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function commissions()
    {
        return $this->hasMany(Commission::class, 'referral_id');
    }
    public function activate()
    {
        $this->update(['status' => 'active']);
    }

    public function deactivate()
    {
        $this->update(['status' => 'inactive']);
    }

    public function isActive()
    {
        return $this->status === 'active';
    }

    // Relationship to get all realtors referred by this realtor (downline)
    public function referrals()
    {
        return $this->hasMany(User::class, 'upline_referral', 'referral_code');
    }

    // Relationship to get the upline realtor who referred this realtor
    public function upline()
    {
        return $this->belongsTo(User::class, 'upline_referral', 'referral_code');
    }
}
