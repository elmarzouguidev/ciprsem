<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
   // protected $table ='categories';

    public function photos()
    {
        /**
         * @ hasMany : one Category has many photo
         */
        return $this->hasMany('App\Photo');
    }
}
