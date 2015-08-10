<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['registration_no', 'make', 'model', 'year'];

    /**
     * Get all learner drivers associated with this car
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function learners()
    {
        return $this->belongsToMany('App\Learner', 'car_learner', 'car_id', 'license_no');
    }
}
