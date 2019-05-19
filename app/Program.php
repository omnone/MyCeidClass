<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //
    public function lesson()
    {
        return $this->belongsto('App\Lesson', 'lesson_id');
    }

    public function room()
    {
        return $this->belongsTo('App\Aithousa', 'aithousa_id');
    }
}
