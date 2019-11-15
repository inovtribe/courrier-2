<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    //

    public function getAtachmentAttribute()
    {
      return $this->profile_image;
    }
}
