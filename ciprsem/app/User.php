<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function photos()
    {
        return $this->hasMany('App\Photo');
    }

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
}
