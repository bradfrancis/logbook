<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $table = "supervisors";
    protected $fillable = ['name', 'license_no'];

    /**
     * Get all learner drives associated with this supervisor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function learners()
    {
        return $this->belongsToMany('App\Learner')->withTimestamps();
    }

    public function getHumanFriendlyAttribute()
    {
        return sprintf('%s (%s)', $this->name, $this->license_no);
    }
}
