<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;
use App\Models\Client;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $client = Client::first();

        if (!$user || !$client) {
            dd('User atau Client belum ada!');
        }

        Event::create([
            'client_id' => $client->id,
            'title' => 'Seminar Digital Marketing',
            'start_date' => now(),
            'end_date' => now()->addDay(),
            'event_type' => 'umum',
            'is_public' => true,
            'is_paid' => false,
            'status' => 'published',
            'created_by' => $user->id
        ]);

        Event::create([
            'client_id' => $client->id,
            'title' => 'Workshop Laravel Advanced',
            'start_date' => now()->addDays(3),
            'end_date' => now()->addDays(4),
            'event_type' => 'freemium',
            'is_public' => true,
            'is_paid' => true,
            'status' => 'published',
            'created_by' => $user->id
        ]);
    }
}