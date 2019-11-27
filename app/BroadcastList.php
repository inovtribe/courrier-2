<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BroadcastList extends Model
{
    protected $guarded = [];

    public function courrier(){
        return $this->belongsTo(Courrier::class);
    } 
    
    public function destinator(){
        return $this->belongsTo(Profile::class);
    } 
}
