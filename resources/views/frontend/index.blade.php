@extends('layouts.app')

@section('title', 'Home - Event EO')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="relative bg-red-600 py-20 px-4 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
                <polygon points="0,0 100,0 100,100" />
            </svg>
        </div>
        
        <div class="max-w-7xl mx-auto relative z-10 text-center lg:text-left flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2">
                <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight">
                    Bikin Event Jadi <span class="text-yellow-300">Lebih Epic</span> Tanpa Ribet.
                </h1>
                <p class="mt-6 text-lg text-red-100 max-w-xl">
                    Platform manajemen tiket dan registrasi event paling simpel buat para EO. Fokus ke acaranya, biar kami yang urus sistemnya.
                </p>
                <div class="mt-10 flex flex-wrap gap-4 justify-center lg:justify-start">
                    <a href="#" class="px-8 py-3 bg-white text-red-600 font-bold rounded-lg shadow-lg hover:bg-gray-100 transition">Cari Event</a>
                    <a href="#" class="px-8 py-3 bg-red-700 text-white font-bold rounded-lg border border-red-400 hover:bg-red-800 transition">Buat Event</a>
                </div>
            </div>
            <div class="hidden lg:block lg:w-1/2">
                <img src="https://illustrations.popsy.co/white/celebration.svg" alt="Event Illustration" class="w-full max-w-md mx-auto">
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 -mt-10 relative z-20">
        <div class="bg-white rounded-xl shadow-xl grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-gray-100">
            <div class="p-6 text-center">
                <p class="text-3xl font-bold text-gray-800">500+</p>
                <p class="text-gray-500 uppercase tracking-wider text-sm font-semibold">Event Aktif</p>
            </div>
            <div class="p-6 text-center">
                <p class="text-3xl font-bold text-gray-800">10k+</p>
                <p class="text-gray-500 uppercase tracking-wider text-sm font-semibold">Tiket Terjual</p>
            </div>
            <div class="p-6 text-center">
                <p class="text-3xl font-bold text-gray-800">24/7</p>
                <p class="text-gray-500 uppercase tracking-wider text-sm font-semibold">Support EO</p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-20">
        <div class="flex justify-between items-end mb-10">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">Event Mendatang</h2>
                <p class="text-gray-500 mt-2">Jangan sampai kehabisan tiket, bro!</p>
            </div>
            <a href="#" class="text-red-600 font-semibold hover:underline">Lihat Semua →</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Looping event terbaru --}}
            @foreach ($event as $e)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl transition duration-300">
                <div class="h-48 bg-gray-200 relative">
                    <a href="/event/{{ $e->id }}">
                        <img src="{{ $e->thumbnail }}" class="w-full h-full object-cover">
                    </a>
                    <span class="absolute top-4 left-4 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase">Music</span>
                </div>
                <div class="p-6">
                    <a href="/event/{{ $e->id }}">
                        <p class="text-red-500 text-sm font-bold">{{ $e->title }}</p>
                    </a>
                    <p class="text-sm py-2 mb-0">{{ \Carbon\Carbon::parse($e->date)->format('d F Y') }}</p>
                    <a href="/event/{{ $e->id }}" class="text-xl font-bold text-gray-800 hover:text-blue-600 transition">{{ $e->name }}</a>
                    <p class="text-gray-500 mt-2 text-sm line-clamp-2">{{ $e->description }}</p>
                    <div class="mt-6 flex justify-between items-center">
                        @if ($e->price > 0)
                            <p class="text-lg font-bold text-gray-900">Rp {{ number_format($e->price, 0, ',', '.') }}</p>
                        @endif
                        <a href="/event/{{ $e->id }}" class="px-4 py-2 bg-gray-900 text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection