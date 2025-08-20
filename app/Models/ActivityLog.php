<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;
     protected $table = "referral_logs";

    protected $fillable = ['actor_name', 'user_id', 'actor_role', 'activity', 'details'];
}