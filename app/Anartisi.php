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

    public function apantiseis()
    {
        return $this->hasMany('App\Anartisi', 'answer_to');
    }

    public function mathima()
    {
        return $this->belongsTo('App\Lesson', 'lesson_id');
    }
}
