<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //.
    public function teacher()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function subscribers()
    {
        return $this->belongsToMany('App\User');
    }

    public function ergasies()
    {
        return $this->hasMany('App\Ergasia');
    }

    public function teams()
    {
        return $this->hasMany('App\Omada');
    }

    public function sizitiseis()
    {
        return $this->hasMany('App\Sizitisi');
    }

    public function anartiseis_gia_mathima()
    {
        return $this->hasMany('App\Anartisi', 'lesson_id');
    }

    public function eksetasi_mathimatos()
    {
        return $this->hasMany('App\Eksetasi');
    }

    public function paradoseis_mathimatos()
    {
        return $this->hasMany('App\Program', 'lesson_id');
    }
}
