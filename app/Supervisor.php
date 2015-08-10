<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $primaryKey = 'license_no';

    protected $fillable = ['name, license_no'];

    /**
     * Get all learner drives associated with this supervisor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function learners()
    {
        return $this->belongsToMany(
            'App\Learner',
            'learner_supervisor',
            'supervisor_license_no',
            'learner_license_no'
        );
    }
}
