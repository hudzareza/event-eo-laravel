@extends('layouts.app')

@section('title', 'About - Event EO')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <div class="bg-gray-900 py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-red-600 via-transparent to-transparent"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <h1 class="text-5xl md:text-7xl font-black text-white italic tracking-tighter uppercase">
                We Create <span class="text-red-600">Impact.</span>
            </h1>
            <p class="text-gray-400 mt-6 text-lg md:text-xl max-w-2xl mx-auto font-medium">
                Gak cuma sekadar bikin acara. Kita di sini buat mastiin setiap momen yang lo buat jadi pengalaman yang gak bakal terlupakan.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 -mt-12 relative z-20">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 text-center">
                <p class="text-4xl font-black text-red-600">500+</p>
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mt-1">Events Managed</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 text-center">
                <p class="text-4xl font-black text-red-600">50k+</p>
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mt-1">Happy Attendees</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 text-center">
                <p class="text-4xl font-black text-red-600">12+</p>
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mt-1">Cities Covered</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-xl border border-gray-100 text-center">
                <p class="text-4xl font-black text-red-600">24/7</p>
                <p class="text-xs font-bold text-gray-500 uppercase tracking-widest mt-1">Solid Support</p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-black text-gray-900 uppercase italic tracking-tighter mb-6">
                    Kenapa Harus <span class="border-b-4 border-red-600">Event EO?</span>
                </h2>
                <div class="space-y-4 text-gray-600 text-lg leading-relaxed">
                    <p>
                        Berawal dari sekumpulan anak muda yang bosen sama sistem manajemen event yang ribet, **Event EO** lahir sebagai solusi *all-in-one* buat lo para promotor, komunitas, dan brand.
                    </p>
                    <p>
                        Kita percaya kalau teknologi harusnya bikin kerjaan lo lebih ringan, bukan malah nambah beban. Dari ticketing sampai manajemen data peserta, semua kita bikin otomatis dan transparan.
                    </p>
                </div>
                
                <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start space-x-3">
                        <div class="bg-red-100 p-1 rounded-full text-red-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </div>
                        <span class="font-bold text-gray-800 uppercase text-sm tracking-tight">Sistem Ticketing Instan</span>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="bg-red-100 p-1 rounded-full text-red-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </div>
                        <span class="font-bold text-gray-800 uppercase text-sm tracking-tight">Data Real-Time</span>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="bg-red-100 p-1 rounded-full text-red-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </div>
                        <span class="font-bold text-gray-800 uppercase text-sm tracking-tight">Check-in Tanpa Antre</span>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="bg-red-100 p-1 rounded-full text-red-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </div>
                        <span class="font-bold text-gray-800 uppercase text-sm tracking-tight">Keamanan Transaksi</span>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute -top-4 -left-4 w-24 h-24 bg-red-600 rounded-2xl z-0"></div>
                <img src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?auto=format&fit=crop&q=80&w=800" 
                     class="rounded-2xl shadow-2xl relative z-10 w-full object-cover h-[450px]" 
                     alt="Our Team in Action">
                <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-gray-900 rounded-2xl z-0"></div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 pb-24 text-center">
        <div class="bg-red-600 rounded-3xl p-10 md:p-16 shadow-2xl shadow-red-200">
            <h3 class="text-3xl md:text-5xl font-black text-white italic uppercase tracking-tighter">
                Siap Bikin Event Gila-Gilaan?
            </h3>
            <p class="text-red-100 mt-4 text-lg font-medium">
                Jangan biarin ide lo cuma jadi rencana. Eksekusi sekarang bareng tim Event EO.
            </p>
            <div class="mt-10">
                <a href="/events" class="bg-white text-red-600 font-black px-10 py-4 rounded-xl uppercase tracking-widest hover:bg-gray-100 transition shadow-lg">
                    Lihat Event Aktif
                </a>
            </div>
        </div>
    </div>
</div>
@endsection