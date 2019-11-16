<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    //
    public function type() {
        return $this->hasOne(Type::class);
    }

    public function destinator(){
        return $this->hasMany(Profile::class);
    }
}
