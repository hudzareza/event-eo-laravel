@extends('layouts.app')

@section('title', 'Events - Event EO')

@section('content')
<div class="bg-gray-50 min-h-screen pb-20">
    <div class="bg-red-600 h-48 w-full relative overflow-hidden flex items-center">
        <div class="absolute inset-0 opacity-10">
            <svg class="h-full w-full" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
                <defs>
                    <pattern id="grid" width="8" height="8" patternUnits="userSpaceOnUse">
                        <path d="M 8 0 L 0 0 0 8" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100" height="100" fill="url(#grid)" />
            </svg>
        </div>

        <div class="max-w-7xl mx-auto w-full px-6 relative z-10">
            <h1 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight">
                Konfirmasi <span class="text-yellow-300">Pendaftaran</span>
            </h1>
            <p class="text-red-100 mt-2 text-lg font-medium max-w-xl">
                Satu langkah lagi buat dapetin tiket lo, bro! Pastiin datanya bener ya.
            </p>
        </div>

        <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-red-500 rounded-full opacity-20 blur-3xl"></div>
        <div class="absolute -left-10 -top-10 w-48 h-48 bg-white rounded-full opacity-10 blur-2xl"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 pt-12 relative z-10">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2">
                <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
                    <div class="flex items-center space-x-3 mb-8 border-b border-gray-100 pb-4">
                        <div class="bg-red-100 p-2 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800">Data Diri Peserta</h2>
                    </div>

                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-lg">
                            <p class="font-bold mb-1">Waduh, ada yang salah nih:</p>
                            <ul class="text-sm list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('event.register', $eventId) }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nama" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition bg-gray-50 focus:bg-white" 
                                    placeholder="Joni Doe">
                            </div>

                            <div>
                                <label for="no_telp" class="block text-sm font-semibold text-gray-700 mb-2">No. WhatsApp</label>
                                <input type="tel" name="no_telp" id="no_telp"
                                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition bg-gray-50 focus:bg-white" 
                                    placeholder="0812xxxx">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Alamat Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" required
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition bg-gray-50 focus:bg-white" 
                                placeholder="joni@example.com">
                        </div>

                        <div>
                            <label for="nik" class="block text-sm font-semibold text-gray-700 mb-2">NIK (Sesuai KTP)</label>
                            <input type="number" name="nik" id="nik"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition bg-gray-50 focus:bg-white" 
                                placeholder="16 digit nomor induk kependudukan">
                        </div>

                        <div class="pt-4">
                            <button type="submit"
                                class="w-full bg-red-600 hover:bg-red-700 text-white font-extrabold py-4 px-6 rounded-xl transition duration-300 shadow-lg shadow-red-200 flex items-center justify-center space-x-2">
                                <span>Konfirmasi & Daftar</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <p class="text-center text-xs text-gray-400 mt-4 italic">
                                Dengan mendaftar, lo setuju sama syarat dan ketentuan Event EO.
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden sticky top-8 border border-gray-100">
                    <div class="p-6 bg-gray-900 text-white">
                        <h3 class="font-bold text-lg">Ringkasan Event</h3>
                    </div>
                    <div class="p-6">
                        <div class="rounded-xl overflow-hidden mb-4">
                            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&q=80&w=500" class="w-full h-32 object-cover">
                        </div>
                        
                        <h4 class="font-bold text-gray-900 text-xl mb-2">Konser Senja Merdeka</h4>
                        
                        <div class="space-y-3 mt-4">
                            <div class="flex items-start text-sm text-gray-600 leading-tight">
                                <span class="mr-3">📅</span>
                                <div>
                                    <p class="font-semibold text-gray-800">25 April 2026</p>
                                    <p class="text-xs">16:00 - Selesai</p>
                                </div>
                            </div>
                            <div class="flex items-start text-sm text-gray-600 leading-tight">
                                <span class="mr-3">📍</span>
                                <div>
                                    <p class="font-semibold text-gray-800">Ancol Beach City</p>
                                    <p class="text-xs">Jakarta Utara</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 pt-6 border-t border-dashed border-gray-200">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-gray-500 text-sm">Harga Tiket</span>
                                <span class="text-gray-900 font-bold">Rp 150.000</span>
                            </div>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-gray-500 text-sm">Biaya Admin</span>
                                <span class="text-green-600 font-bold uppercase text-xs">Free</span>
                            </div>
                            <div class="flex justify-between items-center border-t border-gray-100 pt-4">
                                <span class="text-gray-900 font-bold">Total Bayar</span>
                                <span class="text-2xl font-black text-red-600">Rp 150.000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection