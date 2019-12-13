<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemandeAvisUser extends Model
{
    protected $guarded = [];


    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
    
    public function demandeAvis()
    {
        return $this->belongsTo(DemandeAvis::class);
    }
}
