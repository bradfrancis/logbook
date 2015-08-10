<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Learner extends Model
{
    protected $primaryKey = 'license_no';

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
        return $this->hasMany('App\Drive', 'learner', 'license_no');
    }


    /**
     * Get all cars associated with this learner driver
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cars()
    {
        return $this->belongsToMany('App\Car', null, 'license_no');
    }

    /**
     * Get all supervisors associated with this learner driver
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function supervisors()
    {
        return $this->belongsToMany(
            'App\Supervisor',
            'learner_supervisor',
            'learner_license_no',
            'supervisor_license_no'
        );
    }

    /**
     * @return mixed
     */
    public function getMostRecentlyAddedDrivesAttribute()
    {
        return $this->drives()->orderBy('created_at', 'desc')->limit(5)->get()->all();

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
}
