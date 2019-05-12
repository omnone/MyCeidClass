<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anartisi extends Model
{
    //
    protected $table = 'anartiseis';

    public function posted_by()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

     public function sizitisi()
    {
        return $this->belongsTo('App\Sizitisi', 'sizitisi_id');
    }

}
