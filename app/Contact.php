<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $guarded = [];

    public function scopeCompany($query){
        return  $query->where('entity_type', 'company');
    }

    public function scopePersonal($query){
        return  $query->where('entity_type', 'personal');
    }
}
