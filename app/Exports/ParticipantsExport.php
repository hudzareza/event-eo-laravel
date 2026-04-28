<?php

namespace App\Exports;

use App\Models\Participant;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ParticipantsExport implements FromQuery, WithHeadings, WithMapping
{
    protected $eventId;

    public function __construct($eventId)
    {
        $this->eventId = $eventId;
    }

    public function query()
    {
        // Ambil peserta berdasarkan event_id lewat relasi registration
        return Participant::whereHas('registration', function ($q) {
            $q->where('event_id', $this->eventId);
        });
    }

    public function headings(): array
    {
        return ["Nama Lengkap", "WhatsApp", "Email", "NIK"];
    }

    public function map($participant): array
    {
        return [
            $participant->nama,
            $participant->no_telp,
            $participant->email,
            $participant->nik,
        ];
    }
}