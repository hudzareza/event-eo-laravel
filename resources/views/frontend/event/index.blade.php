@extends('layouts.app')

@section('title', 'Events - Event EO')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="">
            <h1 class="text-3xl font-bold text-red-500">Our Events</h1>
            <p class="text-gray-600 mt-4">Discover and register for exciting events</p>
        </div>

        <div class="mt-10">

            <div class="w-full space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition">
                        <div class="h-48 bg-gray-200 relative">
                            <a href="/registerevent">
                                <img src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?q=80&w=500" alt="Music Fest" class="w-full h-full object-cover">
                            </a>
                            <span class="absolute top-4 right-4 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">Available</span>
                        </div>
                        <div class="p-6">
                            <div class="text-sm text-red-500 font-semibold mb-2">MUSIC FESTIVAL</div>
                            <a href="/registerevent" class="text-xl font-bold text-gray-800 hover:text-blue-600 transition">Summer Beats 2026</a>
                            <p class="text-gray-500 text-sm mt-2 line-clamp-2">Konser musik outdoor terbesar tahun ini dengan line-up artis nasional pilihan.</p>
                            <div class="mt-4 pt-4 border-t border-gray-50 flex items-center justify-between text-gray-600 text-sm">
                                <span>📅 15 Mei 2026</span>
                                <span class="font-bold text-gray-800">Rp 150.000</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition">
                        <div class="h-48 bg-gray-200 relative">
                            <img src="https://images.unsplash.com/photo-1540575861501-7ad0582373f2?q=80&w=500" alt="Tech Seminar" class="w-full h-full object-cover">
                            <span class="absolute top-4 right-4 bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-full">Coming Soon</span>
                        </div>
                        <div class="p-6">
                            <div class="text-sm text-red-500 font-semibold mb-2">TECH SEMINAR</div>
                            <h3 class="text-xl font-bold text-gray-800">Future of AI Workshop</h3>
                            <p class="text-gray-500 text-sm mt-2 line-clamp-2">Belajar implementasi AI terbaru untuk workflow development yang lebih cepat.</p>
                            <div class="mt-4 pt-4 border-t border-gray-50 flex items-center justify-between text-gray-600 text-sm">
                                <span>📅 20 Juni 2026</span>
                                <span class="font-bold text-gray-800">Gratis</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection