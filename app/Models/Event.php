<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    protected static function booted()
    {
        static::creating(function ($event) {
            if (!$event->slug) {
                $event->slug = Str::slug($event->title) . '-' . uniqid();
            }
        });
    }

    protected $fillable = [
        'client_id',
        'title',
        'description',
        'location',
        'start_date',
        'end_date',
        'quota',
        'event_type',
        'registration_type',
        'is_public',
        'is_paid',
        'price',
        'access_token',
        'status',
        'created_by'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function staffs()
    {
        return $this->belongsToMany(User::class, 'event_staffs');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
