<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    // Massive assignement
    protected $guarded = [];

    /**
     * The courriers that belong to avis
    */
    public function courriers(){
        return $this->belongsToMany(Courrier::class, 'avis_courriers');
    }
    
    public function profile(){
        return $this->belongsTo(Profile::class);
    }

    
}
