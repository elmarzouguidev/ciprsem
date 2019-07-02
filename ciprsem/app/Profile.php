<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{


    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function admin()
    {
        return $this->hasMany(Admin::class);
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }
}
