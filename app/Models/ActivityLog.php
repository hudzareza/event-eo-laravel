<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $fillable = [
        'participant_id',
        'activity_code',
        'activity_name',
        'scanned_at'
    ];

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
