<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ergasia extends Model
{
    //
     protected $table = 'ergasies';

     public function submittions(){
        return $this->hasMany('App\Ypovoli');
      }
}
