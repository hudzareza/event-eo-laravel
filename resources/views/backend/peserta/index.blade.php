@extends('backend.layouts.admin')

@section('title', 'Data Peserta')

@section('content')
<div class="p-8">
    <div class="mb-8">
        <h1 class="text-2xl font-extrabold text-gray-900">Pilih Event</h1>
        <p class="text-gray-500">Klik salah satu event untuk melihat daftar peserta yang sudah mendaftar.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:border-red-500 transition duration-300">
            <div class="h-32 bg-gray-100 relative overflow-hidden">
                <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&q=80&w=500" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-3 left-4">
                    <span class="bg-red-600 text-white text-[10px] font-bold px-2 py-1 rounded">MUSIC</span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="font-bold text-gray-900 mb-1">Konser Senja Merdeka</h3>
                <p class="text-xs text-gray-500 mb-6 flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    450 Peserta Terdaftar
                </p>
                <a href="/peserta/1" class="block w-full text-center py-2.5 bg-gray-50 hover:bg-red-600 hover:text-white text-gray-700 text-sm font-bold rounded-xl transition duration-300">
                    Lihat Pendaftar
                </a>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:border-blue-500 transition duration-300">
            <div class="h-32 bg-gray-100 relative overflow-hidden">
                <img src="https://images.unsplash.com/photo-1540575861501-7cf05a4b125a?auto=format&fit=crop&q=80&w=500" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-3 left-4">
                    <span class="bg-blue-600 text-white text-[10px] font-bold px-2 py-1 rounded">TECH</span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="font-bold text-gray-900 mb-1">Tech Conference 2026</h3>
                <p class="text-xs text-gray-500 mb-6 flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    120 Peserta Terdaftar
                </p>
                <a href="/peserta/2" class="block w-full text-center py-2.5 bg-gray-50 hover:bg-blue-600 hover:text-white text-gray-700 text-sm font-bold rounded-xl transition duration-300">
                    Lihat Pendaftar
                </a>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:border-green-500 transition duration-300">
            <div class="h-32 bg-gray-100 relative overflow-hidden">
                <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&q=80&w=500" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-3 left-4">
                    <span class="bg-green-600 text-white text-[10px] font-bold px-2 py-1 rounded">CAREER</span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="font-bold text-gray-900 mb-1">Networking Night</h3>
                <p class="text-xs text-gray-500 mb-6 flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    85 Peserta Terdaftar
                </p>
                <a href="/peserta/3" class="block w-full text-center py-2.5 bg-gray-50 hover:bg-green-600 hover:text-white text-gray-700 text-sm font-bold rounded-xl transition duration-300">
                    Lihat Pendaftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection