<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //

    public function getRutaFotoAttribute($value)
    {
        return 'storage/patient_photos/'.$value;
    }

    protected $fillable = [
        'ruta_foto','nombre','apellido_paterno','apellido_materno', 'sexo', 'edad'
    ];
}
