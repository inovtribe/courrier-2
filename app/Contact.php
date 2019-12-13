<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $guarded = [];

    public function courrier(){
        return $this->belongsTo(Courrier::class);
    }

    public function scopeGetCompany($query){
        return  $query->where('entity_type', 'company');
    }

    public function scopeGetPersonal($query){
        return  $query->where('entity_type', 'personal');
    }
}
