<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;
use App\Models\Client;
use App\Models\Registration;
use App\Models\Participant;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $client = Client::first();

        if (!$user || !$client) {
            dd('User atau Client belum ada!');
        }

        $events = [
            [
                'title' => 'Seminar Digital Marketing 2026',
                'thumbnail' => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30',
                'description' => 'Belajar strategi digital marketing, AI ads, dan growth hacking langsung dari praktisi industri.',
                'location' => 'Jakarta',
                'start_date' => now()->addDays(2),
                'end_date' => now()->addDays(3),
                'quota' => 100,
                'event_type' => 'umum',
                'is_paid' => false,
                'price' => null,
            ],
            [
                'title' => 'Workshop Laravel Advanced',
                'thumbnail' => 'https://images.unsplash.com/photo-1540575861501-7cf9c4bdfc17',
                'description' => 'Deep dive Laravel: Clean Architecture, Queue, Microservices, dan scaling aplikasi.',
                'location' => 'Bandung',
                'start_date' => now()->addDays(5),
                'end_date' => now()->addDays(6),
                'quota' => 50,
                'event_type' => 'freemium',
                'is_paid' => true,
                'price' => 150000,
            ],
            [
                'title' => 'Tech Meetup Startup Founder',
                'thumbnail' => 'https://images.unsplash.com/photo-1515168833906-d2a3b82b1bcd',
                'description' => 'Networking bareng founder startup dan investor.',
                'location' => 'Surabaya',
                'start_date' => now()->addDays(7),
                'end_date' => now()->addDays(7)->addHours(5),
                'quota' => 80,
                'event_type' => 'umum',
                'is_paid' => false,
                'price' => null,
            ],
            [
                'title' => 'Bootcamp Fullstack Developer',
                'thumbnail' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c',
                'description' => 'Bootcamp intensif jadi fullstack developer dalam 2 hari.',
                'location' => 'Yogyakarta',
                'start_date' => now()->addDays(10),
                'end_date' => now()->addDays(12),
                'quota' => 30,
                'event_type' => 'plus',
                'is_paid' => true,
                'price' => 300000,
            ],
            [
                'title' => 'Seminar AI & Future Jobs',
                'thumbnail' => 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d',
                'description' => 'Bagaimana AI akan mengubah dunia kerja di masa depan.',
                'location' => 'Online (Zoom)',
                'start_date' => now()->addDays(1),
                'end_date' => now()->addDays(1)->addHours(3),
                'quota' => 200,
                'event_type' => 'umum',
                'is_paid' => false,
                'price' => null,
            ],
        ];

        foreach ($events as $e) {
            $event = Event::create([
                'client_id' => $client->id,
                'title' => $e['title'],
                'thumbnail' => $e['thumbnail'],
                'description' => $e['description'],
                'location' => $e['location'],
                'start_date' => $e['start_date'],
                'end_date' => $e['end_date'],
                'quota' => $e['quota'],
                'registered_count' => 0,
                'event_type' => $e['event_type'],
                'registration_type' => 'group',
                'is_public' => true,
                'is_paid' => $e['is_paid'],
                'price' => $e['price'],
                'status' => 'published',
                'created_by' => $user->id
            ]);

            // ✅ Create registration group first
            $registration = Registration::create([
                'event_id' => $event->id,
                'user_id' => $user->id,
                'qr_code' => 'QR-' . Str::uuid(),
            ]);

            // ✅ Create participants linked to registration
            for ($i = 1; $i <= 3; $i++) {
                Participant::create([
                    'registration_id' => $registration->id,
                    'nama' => 'Peserta ' . $i . ' - ' . $e['title'],
                    'email' => 'peserta' . $i . '-' . Str::slug($e['title']) . '@test.com',
                    'no_telp' => '08123456' . str_pad($i, 3, '0', STR_PAD_LEFT),
                    'nik' => str_pad($i, 16, '1', STR_PAD_LEFT),
                ]);
            }
        }
    }
}