<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //

    public function medicine(){
        return $this->hasOne('App\Medicine','id','medicine_id');
    }


    public function appointment(){
        return $this->belongsTo('App\Appointment', 'appointment_id','id');
    }
}

