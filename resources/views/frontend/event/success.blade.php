@extends('layouts.app')

@section('title', 'Tiket Kamu')

@section('content')
<div class="min-h-screen bg-gray-100 flex items-center justify-center p-6">

    <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full overflow-hidden">

        <!-- Header -->
        <div class="bg-red-600 text-white p-6 text-center">
            <h1 class="text-2xl font-black uppercase tracking-wide">
                {{ $registration->event->title }}
            </h1>
            <p class="text-sm opacity-80 mt-1">E-Ticket</p>
        </div>

        <!-- Body -->
        <div class="p-6 text-center">

            <p class="text-gray-500 text-sm">Nama Peserta</p>
            <h2 class="text-xl font-bold text-gray-900 mb-4">
                {{ $participant->nama }}
            </h2>

            <!-- QR -->
            <div class="flex justify-center my-6">
                <img src="{{ asset('storage/' . $participant->qr_code) }}" class="w-48 h-48">
            </div>

            <p class="text-xs text-gray-400 break-all">
                {{ $participant->qr_token }}
            </p>

            <div class="mt-6 text-sm text-gray-600">
                Tunjukkan QR ini saat check-in di lokasi event
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-gray-50 p-4 text-center text-xs text-gray-400">
            Powered by Event EO
        </div>
    </div>

</div>
@endsection