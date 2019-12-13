<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvisProfile extends Model
{
    protected $guarded = [];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    
    public function avis()
    {
        return $this->belongsTo(Avis::class);
    }
}
