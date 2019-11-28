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
    
    public function profiles(){
        return $this->belongsToMany(Profile::class, 'annotation_profiles');
    }
    
    /**
     * The courrier that belong to annotation
    */
    public function courriers(){
        return $this->belongsToMany(Courrier::class, 'courrier_annotations');
    }
}
