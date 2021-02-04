<?php

namespace App;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;

class emergencyinfo extends Model implements Searchable
{
    protected $fillable = [
        'member_id',
        'emergency_name',
        'emergency_phone',
        'emergency_relation',
    ];

    public function getSearchResult(): SearchResult
     {
     
         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->member_id
         );
     }
}
