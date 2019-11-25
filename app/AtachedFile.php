<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AtachedFile extends Model
{
    // Mass assignement
    protected $guarded = [];
    
    public function courrier(){
        return $this->belongsTo(Courrier::class);
    }
}
