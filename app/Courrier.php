<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    //
    protected $guarded = [];

    public function type() {
        return $this->hasOne(Type::class);
    }

    public function destinator(){
        return $this->hasOne(Profile::class);
    }
    
    public function expeditor(){
        return $this->hasOne(Contact::class);
    }
    
    public function service_dealing(){
        return $this->hasOne(Service::class);
    }
    
    public function initiate_service(){
        return $this->hasOne(Service::class);
    }

    public function destinatorInCopy(){
        return $this->belongsToMany(Profile::class);
    }

    public function parapheur(){
        return $this->belongsTo(Parapheur::class);
    }
}
