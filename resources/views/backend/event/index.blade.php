@extends('backend.layouts.admin')

@section('title', 'Data Event')

@section('content')
<div class="p-8">
    <div class="mb-8">
        <h1 class="text-2xl font-extrabold text-gray-900">Pilih Event</h1>
        <p class="text-gray-500">Klik salah satu event untuk melihat daftar peserta yang sudah mendaftar.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($event as $event)
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:border-red-500 transition duration-300">
            <div class="h-32 bg-gray-100 relative overflow-hidden">
                <img src="{{ $event->thumbnail }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-3 left-4">
                    <span class="bg-red-600 text-white text-[10px] font-bold px-2 py-1 rounded">MUSIC</span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="font-bold text-gray-900 mb-1">{{ $event->title }}</h3>
                <p class="text-xs text-gray-500 mb-6 flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    {{ $event->registrations->count() }} Peserta Terdaftar
                </p>
                <a href="/backend/event/{{ $event->id }}" class="block w-full text-center py-2.5 bg-gray-50 hover:bg-red-600 hover:text-white text-gray-700 text-sm font-bold rounded-xl transition duration-300">
                    Lihat Pendaftar
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection