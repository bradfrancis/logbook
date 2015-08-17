<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['registration_no', 'make', 'model', 'year'];

    /**
     * Get all learner drivers associated with this car
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function learners()
    {
        return $this->belongsToMany('App\Learner');
    }

    public function getHumanFriendlyAttribute()
    {
        return sprintf('%s %s (%s)', $this->make, $this->model, $this->registration_no);
    }
}
