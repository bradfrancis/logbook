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
        'destination', 'distance_km', 'vehicle_id',
        'supervisor_id', 'title', 'notes'
    ];

    protected $dates = ['start_date', 'end_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function learner()
    {
        return $this->belongsTo('App\Learner');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function supervisor()
    {
        return $this->belongsTo('App\Supervisor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tasks()
    {
        return $this->belongsToMany('App\Task')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function road_types()
    {
        return $this->belongsToMany('App\RoadType')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function visibilities()
    {
        return $this->belongsToMany('App\Visibility')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function traffic_conditions()
    {
        return $this->belongsToMany('App\TrafficCondition')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function road_conditions()
    {
        return $this->belongsToMany('App\RoadCondition')->withTimestamps();
    }

    /**
     * @return mixed
     */
    public function getTasksListAttribute()
    {
        return $this->tasks->lists('id')->all();
    }

    /**
     * @return mixed
     */
    public function getRoadConditionsListAttribute()
    {
        return $this->road_conditions->lists('id')->all();
    }

    /**
     * @return mixed
     */
    public function getTrafficConditionsListAttribute()
    {
        return $this->traffic_conditions->lists('id')->all();
    }

    /**
     * @return mixed
     */
    public function getVisibilitiesListAttribute()
    {
        return $this->visibilities->lists('id')->all();
    }

    /**
     * @return mixed
     */
    public function getRoadTypesListAttribute()
    {
        return $this->road_types->lists('id')->all();
    }

    /**
     * @return mixed
     */
    public function getFormattedStartDateAttribute()
    {
        return $this->start_date->format('d/m/Y');
    }

    /**
     * @return mixed
     */
    public function getFormattedEndDateAttribute()
    {
        return $this->end_date->format('d/m/Y');
    }

    /**
     * @return mixed
     */
    public function getStartTimeAttribute()
    {
        return $this->start_date->format('h:i A');
    }

    /**
     * @return mixed
     */
    public function getEndTimeAttribute()
    {
        return $this->end_date->format('h:i A');
    }

    /**
     * Return the duration of a given drive
     *
     * @return \DateInterval
     */
    public function getDurationAttribute()
    {
        return $this->start_date->diff($this->end_date);
    }

    /**
     * @return int
     */
    public function getDurationInMinutesAttribute()
    {
        $start = $this->start_date->timestamp;
        $end = $this->end_date->timestamp;

        return (int) floor(($end - $start) / 60);
    }

    public function getRoadTypesConcatAttribute()
    {
        $road_types = $this->road_types->lists('key')->all();

        return join(", ", $road_types);
    }

    public function getRoadConditionsConcatAttribute()
    {
        $road_conditions = $this->road_conditions->lists('key')->all();

        return join(", ", $road_conditions);
    }
    public function getTrafficConditionsConcatAttribute()
    {
        $traffic_conditions = $this->traffic_conditions->lists('key')->all();

        return join(", ", $traffic_conditions);
    }
    public function getVisibilitiesConcatAttribute()
    {
        $visibilities = $this->visibilities->lists('key')->all();

        return join(", ", $visibilities);
    }
}
