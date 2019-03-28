<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //.
    public function teacher()
    {
        return $this->belongsTo('App\User','user_id');
    }

     public function subscribers()
    {
        return $this->belongsToMany('App\User');
    }

}
