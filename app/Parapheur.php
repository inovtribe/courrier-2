<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parapheur extends Model
{
    // Massive assignement
    protected $guarded = [];
    

    public function destinator(){
        return $this->belongsTo(Profile::class);
    }
    
    public function expeditor(){
        return $this->belongsTo(Profile::class);
    }

    // public function destinatorsInCopy(){
    //     return $this->belongsTo(Profile::class);
    // }

    public function courrier(){
        return $this->hasOne(Courrier::class);
    }

    public function initiateService(){
        return $this->belongsTo(Service::class);
    }
    
    public function dealingService(){
        return $this->belongsTo(Service::class);
    }

    public function piecesJointes(){
        return $this->hasMany(PieceJointe::class);
    }
}
