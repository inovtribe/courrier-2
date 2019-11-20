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

    public function destinatorInCopy(){
        return $this->belongsToMany(Profile::class);
    }

    public function initiateService(){
        return $this->belongsTo(Service::class);
    }
    
    public function dealingService(){
        return $this->belongsTo(Service::class);
    }

    public function parapheur(){
        return $this->belongsTo(Parapheur::class);
    }

}
