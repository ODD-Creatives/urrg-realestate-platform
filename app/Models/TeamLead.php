<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamLead extends Model
{
     protected $fillable = [
        'fullname',
        'post',
        'picture',
    ];
}
