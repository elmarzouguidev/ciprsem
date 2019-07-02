<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{


    protected $fillable = [
        'title',  'user_id','user_name'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }



}
