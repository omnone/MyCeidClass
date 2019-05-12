<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sizitisi extends Model
{
    //
    protected $table = 'sizitiseis';

     public function anartiseis()
    {
        return $this->hasMany('App\Anartisi');
    }

}
