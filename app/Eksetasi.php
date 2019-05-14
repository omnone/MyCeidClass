<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eksetasi extends Model
{
    //
    protected $table = 'eksetaseis';

    public function rooms()
    {
        return $this->hasMany('App\Aithousa');
    }

    public function eksetastiki()
    {
        return $this->belongsTo('App\Eksetastiki_Periodos');
    }

    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }

    public function simmetoxes()
    {
        return $this->hasMany('App\Dilosi')->withTimestamps();
    }
}
