<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    //
    protected $guarded = [];

    public function type() {
        return $this->belongsTo(Type::class);
    }
    
    public function attachedFiles() {
        return $this->hasMany(AtachedFile::class);
    }
    
    public function demandesAvis() {
        return $this->hasMany(DemandeAvis::class);
    }
    
    public function expeditor(){
        return $this->belongsTo(Contact::class);
    }
    
    public function service(){
        return $this->belongsTo(Service::class);
    }
    
    public function sendsTo(){
        return $this->belongsToMany(Profile::class, 'expeditor_internal_id', 'destinator_id');
    }
    
    public function folder(){
        return $this->belongsTo(Folder::class);
    }

    /**
     * The avis that belong to courrier
    */
    public function avis(){
        return $this->belongsToMany(Avis::class, 'avis_courriers');
    }
    
    /**
     * The annotation that belong to courrier
    */
    public function annotations(){
        return $this->belongsToMany(Annotation::class, 'courrier_annotations');
    }
}
