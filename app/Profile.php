<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class);
    }
    //
    public function service(){
        return $this->belongsTo(Service::class);
    }
    
    public function serviceResponsable(){
        return $this->hasOne(Service::class);
    } 
    
    public function courrier(){
        return $this->belongsTo(Courrier::class);
    }
}
