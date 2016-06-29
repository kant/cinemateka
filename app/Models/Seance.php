<?php

namespace App\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
     */

    protected $table    = 'seances';
    public $timestamps  = true;
    protected $fillable = [
        'start_time',
        'place_id',
        'event_id',
        'program_id',
        'price',
        'description',
        'speaker_info',
        'images',
        'videos',
        'properties',
    ];
    protected $fakeColumns = [
        'images',
        'videos',
        'properties',
    ];
    protected $dates = ['start_time'];
    // protected $hidden = [];
    // protected $appends = [
    //     'event_name',
    //     'program_name',
    //     'place_name',
    // ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
     */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
     */
    public function event()
    {
        return $this->belongsTo('App\Models\Event');
    }

    public function program()
    {
        return $this->belongsTo('App\Models\Program');
    }

    public function place()
    {
        return $this->belongsTo('App\Models\Place');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
     */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
     */
    public function getEventNameAttribute()
    {
        return App\Models\Event::where([
            'id' => $this->event_id,
        ])->first()->title;
    }

    public function getProgramNameAttribute()
    {
        return App\Models\Program::where([
            'id' => $this->program_id,
        ])->first()->title;
    }

    public function getPlaceNameAttribute()
    {
        return App\Models\Place::where([
            'id' => $this->place_id,
        ])->first()->title;
    }

    /*
|--------------------------------------------------------------------------
| MUTATORS
|--------------------------------------------------------------------------
 */
}
