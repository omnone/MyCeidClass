<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aithousa extends Model
{
    protected $table = 'aithouses';

    public function eksetaseis()
    {
        return $this->belongsToMany('App\Eksetasi', 'aithouses_eksetasis', 'aithousa_id')->withTimestamps();
        ;
    }

    public function paradoseis()
    {
        return $this->belongsToMany('App\Program', 'aithousa_id');
    }
}
