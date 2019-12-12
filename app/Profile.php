<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    // Mass assignement
    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function service(){
        return $this->belongsTo(Service::class);
    }
    
    
    public function avis(){
        return $this->belongsToMany(Avis::class, 'avis_profiles');
    }
    
    public function annotations(){
        return $this->belongsToMany(Annotation::class, 'annotation_profiles');
    }

    public function folder() {
        return $this->hasOne(Folder::class);
    }
    
    public function parapher() {
        return $this->hasOne(Parapher::class);
    }
    

    public function demandeAvisUser(){
        return $this->belongsToMany(DemandeAvisUser::class, 'demande_avis_profile');
    }
}
