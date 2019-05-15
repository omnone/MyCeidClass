<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Aithousa_Eksetasis extends Pivot
{
    //
    protected $table = 'aithouses_eksetasis';

    public function eksetaseis()
    {
        return $this->belongsToMany('App\Eksetasi')
                        ->using('App\Aithousa_Eksetasis')
                        ->withPivot([
                          'eksetasi_id'
                        ]);
    }

    public function rooms()
    {
        return $this->belongsTo('App\Aithousa')
                        ->using('App\Aithousa_Eksetasis')
                        ->withPivot([
                          'aithousa_id'
                        ]);
    }
}
