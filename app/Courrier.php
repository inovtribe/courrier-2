<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    //
    protected $guarded = [];
    protected $dates = ['mail_date_arrived'];

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
    
    public function createdBy(){
        return $this->belongsTo(Profile::class, 'created_by');
    }

    public function folder(){
        return $this->belongsTo(Folder::class);
    }

    public function parapher(){
        return $this->belongsTo(Parapher::class);
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
