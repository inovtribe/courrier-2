<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $guarded = [];

    public function userNotif(){
        return $this->hasMany(UserNotification::class);
    }
}
