<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eksetastiki_Periodos extends Model
{
    //
    protected $table = 'eksetastikes_periodoi';

    public function exams()
    {
        return $this->hasMany('App\Eksetasi');
    }
}
