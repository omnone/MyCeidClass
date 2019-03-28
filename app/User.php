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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


   // user has many posts - edw vazw ta relationships
    public function posts(){
      return $this->hasMany('App\Post');
    }

     public function teaching_lessons(){
      return $this->hasMany('App\Lesson');
    }

    public function subscribed_lessons()
    {
        return $this->belongsToMany('App\Lesson')->withTimestamps();
    }
}
