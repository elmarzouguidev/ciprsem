<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;


class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * @var string
     */

    protected $guarded = 'admin';
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

    
    public function roles()
    {
        return $this->belongsToMany('App\Role','admin_role','admin_id','role_id');
    }


    /**
     * @param $roles
     * @return bool
     */
    public function HasAnyRole($roles)
    {
        if(is_array($roles))
        {
            foreach ($roles as $role)
            {
                if($this->HasRole($role))
                {
                    return true;
                }
            }
        }
        else
        {
            if($this->HasRole($roles))
            {
                return true;
            }
        }

        return false;
    }

    public function HasRole($role)
    {
        if($this->roles()->where('name',$role)->first())
        {
            return true;
        }

        return false;
    }

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

    public function profile()
    {

        return $this->hasOne('App\Profile');
    }

    public function activities()
    {
        return $this->hasMany('App\Activity');
    }

    public function settings()
    {
        return $this->hasMany(Setting::class);
    }


    /**
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    /**
     * @return string
     */
   /* public function getGuard()
    {
        return $this->guard;
    }*/
}
