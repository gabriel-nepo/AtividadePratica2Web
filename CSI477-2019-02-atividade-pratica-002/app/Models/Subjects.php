<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subjects extends Model
{
    // subject -> request 1:n
    public function requests(){
        return $this->hasMany('App\User');
    }
}
