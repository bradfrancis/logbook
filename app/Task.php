<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['description'];

    /**
     * Get all drives associated with a given driving task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function drives()
    {
        return $this->belongsToMany('App\Drive');
    }
}
