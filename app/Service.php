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
        return $this->hasOne(Profile::class);
    }

    public function courrier(){
        return $this->belongsTo(Courrier::class);
    }

    public function parapheur(){
        return $this->belongsTo(Parapheur::class);
    }
}
