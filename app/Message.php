<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $table = 'messages';

    public function receiver()
    {
        return $this->belongsTo('App\User', 'receiver_id');
    }

    public function sender()
    {
        return $this->belongsTo('App\User', 'sender_id');
    }

    public function file()
    {
        return $this->hasOne('App\Arxeio', 'id' ,'file_id');
    }
}
