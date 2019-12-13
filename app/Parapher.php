<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parapher extends Model
{
    protected $guarded = [];

    public function attachedFiles()
    {
        return $this->hasMany(AttachedFile::class);
    }

    public function courrier()
    {
        return $this->hasOne(Courrier::class);
    }

    public function destinator()
    {
        return $this->belongsTo(Profile::class, 'destinator_id');
    }
    
    public function expeditor()
    {
        return $this->belongsTo(Profile::class, 'expeditor_id');
    }
    
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
