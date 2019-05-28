<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function grades()
    {
        return $this->hasMany('App\Bathmologia');
    }

    public function teaching_lessons()
    {
        return $this->hasMany('App\Lesson');
    }

    public function subscribed_lessons()
    {
        return $this->belongsToMany('App\Lesson')->withTimestamps();
    }

    public function subscribed_teams()
    {
        return $this->belongsToMany('App\Omada')->withTimestamps();
    }

    public function grades_file()
    {
        return $this->hasOne('App\Arxeio');
    }

    public function profile_photo()
    {
        return $this->hasOne('App\Fwtografia');
    }

    public function anartiseis()
    {
        return $this->hasMany('App\Anartisi');
    }

    public function ypovoles()
    {
        return $this->hasMany('App\Ypovoli', 'user_id');
    }

    public function simmetoxi_se_eksetasi()
    {
        return $this->hasMany('App\Dilosi');
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->surname} {$this->id}";
    }

    public function send_messages()
    {
        return $this->hasMany('App\Message', 'sender_id');
    }

    public function inbox_messages()
    {
        return $this->hasMany('App\Message', 'receiver_id');
    }
}
