<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $guarded = [];

    public function collaborateurs(){
        return $this->hasMany(Profile::class);
    }

    public function profile(){
        return $this->belongsTo(Profile::class, 'responsable_id');
    }
    
    public function folder(){
        return $this->hasOne(Folder::class);
    }
    
    public function parapher(){
        return $this->hasOne(Parapher::class);
    }

    public function courriers(){
        return $this->hasMany(Courrier::class);
    }
}
