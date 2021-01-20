<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personalinfo extends Model
{
   protected $fillable = [
    'profileImg',
    'title' ,
    'name', 
    'email' ,   
    'phone',
    'dob',
    'address' ,
    'hometown' ,
    'age' ,
    'status' ,
    'employmentstat' ,
    'occupation' ,
    'profession' ,
   ];
   
}
