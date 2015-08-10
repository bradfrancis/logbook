<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Drive
 * @package App
 */
class Drive extends Model
{
    protected $table = 'drives';

    protected $fillable = [
        'start_date', 'end_date', 'origin',
        'destination', 'distance_km',
    ];

    protected $dates = ['start_date', 'end_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function learner()
    {
        return $this->belongsTo('App\Learner', 'learner');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function supervisor()
    {
        return $this->hasOne('App\Supervisor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function car()
    {
        return $this->hasOne('App\Car');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tasks()
    {
        return $this->belongsToMany('App\Task');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function road_types()
    {
        return $this->belongsToMany('App\RoadType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function visibilities()
    {
        return $this->belongsToMany('App\Visibility');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function traffic_conditions()
    {
        return $this->belongsToMany('App\TrafficCondition');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function road_conditions()
    {
        return $this->belongsToMany('App\RoadCondition');
    }
}
