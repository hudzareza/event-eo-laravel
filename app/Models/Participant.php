<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'registration_id',
        'nama',
        'email',
        'no_telp',
        'nik',
        'qr_code',
        'qr_token',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}