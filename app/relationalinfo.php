<?php

namespace App;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult; 
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class relationalinfo extends Model implements Searchable
{
   use LogsActivity;
   protected static $logAttributes =  [
      'period_of_stay' ,
      'baptized' ,
      'berean_center' ,
      'tithe' ,
      'welfare' ,
      'ministry' ,
      'department' ,
   ];

   public function getDescriptionForEvent(string $eventName): string
   {
       return "Has been {$eventName}";
   }
   protected static $logName = 'relational';
   protected static $logOnlyDirty = true;

    protected $fillable = [
            'member_id',
            'period_of_stay' ,
            'baptized' ,
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
