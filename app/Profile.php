<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    // Mass assignement
    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function service(){
        return $this->belongsTo(Service::class);
    } 
    
    public function courriers(){
        return $this->hasMany(Courrier::class);
    }
    
    public function avis(){
        return $this->hasMany(Avis::class);
    }
    
    public function annotations(){
        return $this->hasMany(Annotation::class);
    }
    
    public function courrier(){
        return $this->belongsTo(Courrier::class);
    } 
    
    public function roles(){
        return $this->hasMany(Role::class);
    }

    public function broadcastList() {
        return $this->hasOne(BroadcastList::class);
    }
    
    public function folder() {
        return $this->hasOne(Folder::class);
    }
}
