<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User_type extends Model
{
    //

    public function users(){
        return $this->hasMany('App\User');
    }
}
