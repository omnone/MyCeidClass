<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ypovoli extends Model
{
    protected $table = 'ypovoles';

    public function student()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
