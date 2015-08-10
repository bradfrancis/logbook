<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visibility extends Model
{
    protected $table = 'visibility';

    protected $fillable = ['key', 'description'];

    /**
     * Get all drives for a given visibility
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function drives()
    {
        return $this->belongsToMany('App\Drive');
    }
}
