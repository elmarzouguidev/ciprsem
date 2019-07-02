<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{



    protected $fillable = [
        'title', 'linke', 'user_id'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }

    public function scopeVideoByAdmin($query)
    {
        return $query->where('user_type','admin')->get();
    }
}
