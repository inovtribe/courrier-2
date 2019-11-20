<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Mass assignement
    protected $guarded = [];

    
    public function profile(){
        return $this->belongsTo(Role::class);
    } 
}
