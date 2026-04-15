<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'no_telp',
        'nik',
    ];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}