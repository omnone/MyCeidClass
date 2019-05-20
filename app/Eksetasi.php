<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eksetasi extends Model
{
    //
    protected $table = 'eksetaseis';

    public function rooms()
    {
        return $this->belongsToMany('App\Aithousa', 'aithouses_eksetasis', 'eksetasi_id');
    }

    public function eksetastiki()
    {
        return $this->belongsTo('App\Eksetastiki_Periodos','eksetastiki__periodos_id');
    }

    public function lesson()
    {
        return $this->belongsTo('App\Lesson');
    }

    public function simmetoxes()
    {
        return $this->hasMany('App\Dilosi');
    }
}
