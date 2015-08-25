<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Learner extends Model
{
    const L1_REQUIRED_HOURS = 30;
    const L2_REQUIRED_HOURS = 50;

    protected $table = 'learners';

    protected $fillable = ['license_no', 'name', 'license_level'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get all drives associated with this learner
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function drives()
    {
        return $this->hasMany('App\Drive')->orderBy('created_at', 'desc');
    }


    /**
     * Get all vehicles associated with this learner driver
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vehicles()
    {
        return $this->belongsToMany('App\Vehicle')->withTimestamps();
    }

    /**
     * Get all supervisors associated with this learner driver
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function supervisors()
    {

        return $this->belongsToMany('App\Supervisor')->withTimestamps();
    }

    /**
     * @return mixed
     */
    public function getMostRecentAttribute()
    {
        return $this->drives->take(5);

    }

    /**
     * Calculate the total number of hours logged by a given learner
     *
     * N.B. The original concept of this function was found at
     * http://stackoverflow.com/questions/11556731/how-we-can-add-two-date-intervals-in-php/11556878#11556878
     *
     * @return \DateInterval
     */
    public function getHoursLoggedAttribute()
    {
        // Set "base" time
        $base = new \DateTime('00:00');

        // Create a copy
        $aggregate = clone $base;

        $interval = null;

        // Iterate through all logged drivers the current learner
        foreach($this->drives as $drive)
        {
            // Get the duration of the drive
            $interval = $drive->duration;

            // Add it to the aggregate time
            $aggregate->add($interval);
        }

        // Calculate and return the difference between the
        // base time and the aggregate of all the drives
        return $aggregate->diff($base);
    }

    /**
     * Return the minimum required hours for a learner
     * dependant on their license level.
     *
     * N.B. If the 'license_level' attribute on the
     * current learner is not set it assumes a level
     * of 'L1'
     *
     * @return int
     */
    public function getMinimumHoursAttribute()
    {
        if ($this->license_level === 'L2')
        {
            return Learner::L2_REQUIRED_HOURS;
        }
        else {
            return Learner::L1_REQUIRED_HOURS;
        }
    }

    /**
     * @return mixed
     */
    public function getRecentTasksAttribute()
    {
        return DB::table('drives')
            ->join('drive_task', 'drives.id', '=', 'drive_task.drive_id')
            ->join('tasks', 'drive_task.task_id', '=', 'tasks.id')
            ->select('*')
            ->orderBy('drives.end_date', 'desc')
            ->limit(10)
            ->get();
    }

    /**
     * Calculates and returns a percentage of hours
     * completed by a given learner
     *
     *
     * @return int
     */
    public function getPercentCompleteAttribute()
    {
        // Get the total time logged for the current learner
        $timeLogged = $this->getHoursLoggedAttribute();

        // Calculate number of hours in decimal form
        $hours = $timeLogged->h + ($timeLogged->i / 60);

        // Calculate percentage completed
        $percentage = (100 / $this->minimum_hours) * $hours;

        // Return percentage as an integer
        return (int) round($percentage);
    }
}
