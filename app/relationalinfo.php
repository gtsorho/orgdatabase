<?php

namespace App;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult; 
use Illuminate\Database\Eloquent\Model;

class relationalinfo extends Model implements Searchable
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

    public function getSearchResult(): SearchResult
     {
      //   $url = route('', $this->slug);
         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->member_id,
            // $url
         );
     }
}
