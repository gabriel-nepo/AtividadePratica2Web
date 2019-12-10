<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class requests extends Model
{

    // request-> subject n:1
    public function subject(){
        return $this->belongsTo('App\Models\Subjects');
    }
    // request-> user n:1
    public function user(){
        return $this->belongsTo('App\User');
    }
}
