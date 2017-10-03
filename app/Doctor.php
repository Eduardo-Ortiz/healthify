<?php

namespace App;

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

    protected $fillable = [
        'photo','nombre','apellido_paterno','apellido_materno', 'photo'
    ];
}
