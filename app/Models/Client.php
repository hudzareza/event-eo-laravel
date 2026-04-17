<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_clients')
            ->withPivot('role');
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
