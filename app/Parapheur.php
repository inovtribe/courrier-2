<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parapheur extends Model
{
    // Massive assignement
    protected $guarded = [];
    
    public function courrier(){
        return $this->belongsTo(Courrier::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function piecesJointes(){
        return $this->hasMany(PieceJointe::class);
    }
}
