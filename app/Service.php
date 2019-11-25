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
        return $this->hasOne(Profile::class);
    }

    public function courriers(){
        return $this->hasMany(Courrier::class);
    }
}
