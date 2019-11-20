<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Annotation extends Model
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
