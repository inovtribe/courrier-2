<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $guarded = [];

    public function profiles(){
        return $this->hasMany(Profile::class);
    }

    public function responsable(){
        return $this->belongsTo(Profile::class);
    }
}
