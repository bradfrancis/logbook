<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoadType extends Model
{
    protected $table = 'road_types';

    protected $fillable = ['key', 'description'];

    /**
     * Get all drives with a given road type
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function drives()
    {
        return $this->belongsToMany('App\Drive');
    }
}
