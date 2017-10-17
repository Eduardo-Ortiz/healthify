<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    //
    public $timestamps = false;

    public function speciality()
    {
        return $this->belongsTo('App\Speciality','especialidad');
    }

    public function getRutaFotoAttribute($value)
    {
        return 'storage/worker_photos/'.$value;
    }

    public function getFullName()
    {
        return $this->nombre." ".$this->apellido_paterno;
    }

    protected $fillable = [
        'photo','nombre','apellido_paterno','apellido_materno', 'photo'
    ];


    public function mensualIncome()
    {
        $mensualIncome = Appointment::join('doctors','appointmens.doctor','=','doctors.user_id')
            ->where('created_at', '>=', Carbon::now()->startOfMonth())
            ->where('status', '=', 1)
            ->where('doctors.id','=',$this->id)
            ->sum('costo');

        return $mensualIncome;
    }
}
