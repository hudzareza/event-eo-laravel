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
                Satu langkah lagi buat dapetin tiket lo, bro!
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 pt-12 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                    <img src="{{ $event->thumbnail }}" class="w-full h-[400px] object-cover" alt="Event Banner">

                    <div class="p-8">
                        <div class="mb-6">
                            <h2 class="text-4xl font-black text-gray-900 mt-2 italic uppercase tracking-tighter leading-none">
                                {{ $event->title }}
                            </h2>
                        </div>

                        <div class="prose max-w-none text-gray-600 mb-10">
                            <p class="text-lg leading-relaxed">
                                {{ $event->description }}
                            </p>
                        </div>

                        <hr class="border-gray-100 mb-10">

                        <div class="bg-gray-50 p-6 md:p-8 rounded-2xl border border-gray-200">
                            <div class="flex items-center space-x-3 mb-8">
                                <div class="bg-red-600 p-2 rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800">Isi Data Diri Lo</h3>
                            </div>

                            @if ($errors->any())
                                <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-r-lg">
                                    <ul class="text-sm list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('event.register', $event->id) }}" method="POST" class="space-y-6">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-2 italic">NAMA LENGKAP</label>
                                        <input type="text" name="nama" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 outline-none transition" placeholder="Joni Doe">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-bold text-gray-700 mb-2 italic">NO. WHATSAPP</label>
                                        <input type="tel" name="no_telp" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 outline-none transition" placeholder="0812xxxx">
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 italic">EMAIL *</label>
                                    <input type="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 outline-none transition" placeholder="joni@example.com">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 italic">NIK (KTP)</label>
                                    <input type="number" name="nik" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 outline-none transition" placeholder="16 digit NIK">
                                </div>
                                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-black py-4 px-6 rounded-xl transition duration-300 shadow-lg flex items-center justify-center space-x-2 uppercase italic tracking-wider">
                                    <span>Konfirmasi & Daftar Sekarang</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-28 space-y-6">
                    <div class="bg-white rounded-2xl shadow-xl p-6 border border-gray-100">
                        <h4 class="text-xs font-black text-gray-400 uppercase tracking-[0.2em] mb-6 border-b pb-2">Event Information</h4>

                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="bg-red-50 p-3 rounded-xl mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-gray-400 uppercase">Waktu</p>
                                    <p class="font-bold text-gray-900 leading-tight">{{ \Carbon\Carbon::parse($event->date)->locale('id')->translatedFormat('l, d F Y') }}</p>
                                    <p class="text-sm text-gray-500 mt-1">16:00 WIB - Selesai</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="bg-gray-100 p-3 rounded-xl mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-gray-400 uppercase">Lokasi</p>
                                    <p class="font-bold text-gray-900 leading-tight">{{ $event->location }}</p>
                                    <p class="text-sm text-gray-500 mt-1">{{ $event->city }}, Indonesia</p>
                                </div>
                            </div>
                        </div>

                        @if ($event->price > 0)
                            <div class="mt-8 pt-6 border-t border-dashed border-gray-200">
                                <div class="bg-gray-900 text-white p-4 rounded-xl">
                                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Total Harga</p>
                                    <div class="flex items-baseline justify-between mt-1">
                                        <span class="text-2xl font-black italic text-yellow-300">Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                                        <span class="text-[9px] bg-red-600 px-2 py-0.5 rounded font-bold uppercase">Tax Inc.</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="flex items-center justify-center gap-2 py-3 bg-white border border-gray-100 rounded-xl shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-[10px] text-gray-500 font-bold uppercase tracking-widest">Verified Event EO System</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection