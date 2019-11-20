<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function parapherReceive(){
        return $this->hasOne(Parapher::class);
    }
    
    public function parapherSend(){
        return $this->hasOne(Parapher::class);
    }
    
    // public function allParaphers(){
    //     return $this->hasMany(Parapher::class);
    // }
    
    public function service(){
        return $this->belongsTo(Service::class);
    }
    
    public function serviceResponsable(){
        return $this->belongsTo(Service::class);
    } 

    // public function allCopieCourriers(){
    //     return $this->belongsTo(Courrier::class);
    // }
    
    public function courrier(){
        return $this->belongsTo(Courrier::class);
    }
}
