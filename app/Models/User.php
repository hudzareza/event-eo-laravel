<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    // =====================
    // RELATION
    // =====================

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'user_clients')
            ->withPivot('role');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'created_by');
    }

    public function eventStaffs()
    {
        return $this->belongsToMany(Event::class, 'event_staffs');
    }

    // =====================
    // GLOBAL ROLE
    // =====================

    public function isSuperAdmin()
    {
        return $this->role === 'super_admin';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isStaff()
    {
        return $this->role === 'staff';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    public function hasRole($role)
    {
        return $this->role === $role;
    }

    // =====================
    // CLIENT ROLE
    // =====================

    public function isClientAdmin($clientId)
    {
        return $this->clients()
            ->where('client_id', $clientId)
            ->wherePivot('role', 'admin')
            ->exists();
    }

    public function isClientStaff($clientId)
    {
        return $this->clients()
            ->where('client_id', $clientId)
            ->wherePivot('role', 'staff')
            ->exists();
    }

    // =====================
    // EVENT ROLE
    // =====================

    public function isEventStaff($eventId)
    {
        return $this->eventStaffs()
            ->where('event_id', $eventId)
            ->exists();
    }
}
