<?php

namespace App;

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
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function drives()
    {
        return $this->hasMany('App\Drive', 'learner', 'license_no');
    }


    /**
     * Get all cars associated to this learner driver
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
}
