<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PieceJointe extends Model
{
    // Massive assignement
    protected $guarded = [];
    
    public function parapheur(){
        return $this->belongsTo(Parapheur::class);
    }
}
