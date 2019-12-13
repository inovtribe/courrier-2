<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    protected $guarded = [];
    protected $with = ['notifications'];


    public function notifications()
    {
        return $this->belongsTo(Notification::class, 'notification_id');
    }
}
