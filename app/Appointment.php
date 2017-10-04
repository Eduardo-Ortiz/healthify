<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $table = 'appointmens';

    public function getTextHour(){

        $hour = $this->hour;
        if($hour==1)
            return "8:00-9:00";
        if($hour==2)
            return "9:00-10:00";
        if($hour==3)
            return "10:00-11:00";
        if($hour==4)
            return "11:00-12:00";
        if($hour==5)
            return "12:00-13:00";
        if($hour==6)
            return "15:00-16:00";
        if($hour==7)
            return "16:00-17:00";
        if($hour==8)
            return "17:00-18:00";
        if($hour==9)
            return "18:00-19:00";
        if($hour==10)
            return "19:00-20:00";
    }

    public function getDoctor(){
        return $this->hasOne('App\User','id','doctor');
    }

    public function patient(){
        return $this->hasOne('App\User','id','expedient');
    }
}
