<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrafficCondition extends Model
{
    protected $table = 'traffic_conditions';

    protected $fillable = ['key', 'description'];

    /**
     * Get all drives for a given traffic condition
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function drives()
    {
        return $this->belongsToMany('App\Drive');
    }
}
