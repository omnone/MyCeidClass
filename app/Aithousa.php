<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aithousa extends Model
{
    protected $table = 'aithouses';

    public function used_for_exams()
    {
        return $this->belongsToMany('App\Eksetasi')->withTimestamps();
    }
}
