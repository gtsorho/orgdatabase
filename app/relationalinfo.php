<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class relationalinfo extends Model
{
    protected $fillable = [
            'member_id',
            'period_of_stay' ,
            'berean_center' ,
            'tithe' ,
            'welfare' ,
            'ministry' ,
            'department' ,
    ];
}
