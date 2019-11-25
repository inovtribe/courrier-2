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
    
    public function attachedFiles() {
        return $this->hasMany(AttachedFile::class);
    }
    
    public function expeditor(){
        return $this->hasOne(Contact::class);
    }
    
    public function service(){
        return $this->belongsTo(Service::class);
    }
    
    public function destinator(){
        return $this->belongsTo(Profile::class);
    }
    
    public function destinators() {
        return $this->hasMany(Profile::class);
    }
    
    public function avis() {
        return $this->hasMany(Avis::class);
    }

}
