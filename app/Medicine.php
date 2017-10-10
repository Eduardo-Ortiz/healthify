<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    //
    public function purpose()
    {
        return $this->belongsTo('App\Purposes');
    }

    public function presentation()
    {
        return $this->belongsTo('App\Presentation');
    }



    protected $fillable = [
        'name','existence','purpose_id','presentation_id'
    ];
}
