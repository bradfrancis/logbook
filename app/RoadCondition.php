<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoadCondition extends Model
{
    protected $table = 'road_conditions';

    protected $fillable = ['key', 'description'];

    /**
     * Get all drives for a given road condition
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function drives()
    {
        return $this->belongsToMany('App\Drive');
    }
}
