<?php

namespace App;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class emergencyinfo extends Model implements Searchable
{
    use LogsActivity;
    protected static $logAttributes =  [
        'emergency_name',
        'emergency_phone',
        'emergency_relation',
    ];
    public function getDescriptionForEvent(string $eventName): string
    {
        return "Has been {$eventName}";
    }
    protected static $logName = 'emergency';
    protected static $logOnlyDirty = true;

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
