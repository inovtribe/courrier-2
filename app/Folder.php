<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $guarded = [];

    public function responsable(){
        return $this->belongsTo(Profile::class);
    } 
    
    public function service(){
        return $this->belongsTo(Service::class);
    } 
    
    public function courriers(){
        return $this->hasMany(Courrier::class);
    }
}
