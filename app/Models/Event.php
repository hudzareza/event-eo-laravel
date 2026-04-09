<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
