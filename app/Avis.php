<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    // Massive assignement
    protected $guarded = [];

    public function courrier(){
        return $this->belongsTo(Courrier::class);
    }
    
    public function profile(){
        return $this->belongsTo(Profile::class);
    }

    
}
