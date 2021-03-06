<?php

namespace App;

use App\emergencyinfo;
use App\relationalinfo;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class personalinfo extends Model implements Searchable
{
    use LogsActivity;
    protected static $logAttributes = [
        'title' ,
        'name', 
        'email' ,   
        'phone',
        'dob',
        'address' ,
        'hometown' ,
        'age' ,
        'status' ,
        'noChildren',
        'employmentstat' ,
        'occupation' ,
        'profession' ,
    ];
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Has been {$eventName}";
    }
    protected static $logName = 'personal';
    protected static $logOnlyDirty = true;
    
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
    'noChildren',
    'employmentstat' ,
    'occupation' ,
    'profession' ,
   ];

   public function getSearchResult(): SearchResult
     {
      //   $url = route('', $this->slug);
         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->title,
            // $url
         );
     }

     public function reationshipinfo()
     {
         return $this->hasOne(relationalinfo::class, 'member_id');
     }
   
     public function emergencyinfo()
     {
         return $this->hasOne(emergencyinfo::class, 'member_id');
     }
}
