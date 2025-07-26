<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferralLog extends Model
{
     protected $fillable = [
        'user_id',
        'referrer_id',
        'referrer_type',
        'level'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function referrer()
    {
        return $this->morphTo();
    }
}
