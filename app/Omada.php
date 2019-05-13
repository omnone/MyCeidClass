<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Omada extends Model
{
    //
    protected $table = 'teams';

    public function members()
    {
        return $this->belongsToMany('App\User')->withTimestamps();;
    }
}
