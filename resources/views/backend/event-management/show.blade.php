@extends('backend.layouts.admin')

@section('title', 'Detail Event')

@section('content')
<div class="p-6 max-w-6xl mx-auto">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">{{ $event->title }}</h1>
            <p class="text-gray-500 text-sm">{{ $event->location }}</p>
        </div>

        <a href="/backend/event-management/{{ $event->id }}/edit"
           class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
            Edit
        </a>
    </div>

    {{-- STATS --}}
    <div class="grid md:grid-cols-4 gap-4 mb-6">

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-sm text-gray-500">Peserta</p>
            <p class="text-xl font-bold">{{ $event->registered_count }}</p>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-sm text-gray-500">Quota</p>
            <p class="text-xl font-bold">{{ $event->quota }}</p>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-sm text-gray-500">Status</p>
            <p class="text-xl font-bold">{{ strtoupper($event->status) }}</p>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <p class="text-sm text-gray-500">Tipe</p>
            <p class="text-xl font-bold">{{ $event->event_type }}</p>
        </div>

    </div>

    {{-- DETAIL --}}
    <div class="bg-white p-6 rounded-2xl shadow space-y-4">

        <p><strong>Deskripsi:</strong><br>{{ $event->description }}</p>

        <p><strong>Tanggal:</strong><br>
            {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y H:i') }}
            -
            {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y H:i') }}
        </p>

        <p><strong>Harga:</strong><br>
            {{ $event->is_paid ? 'Rp '.number_format($event->price) : 'Gratis' }}
        </p>

    </div>

</div>
@endsection