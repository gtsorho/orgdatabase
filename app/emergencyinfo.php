<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emergencyinfo extends Model
{
    protected $fillable = [
        'member_id',
        'emergency_name',
        'emergency_phone',
        'emergency_relation',
    ];
}
