@extends('layouts.app')

@section('title', 'Events - Event EO')

@section('content')
<div class="bg-gray-50 min-h-screen pb-20">
    <div class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">
                        Explore <span class="text-red-600">Events</span>
                    </h1>
                    <p class="text-gray-500 mt-2 text-lg">Temukan pengalaman seru dan amankan tiketmu sekarang.</p>
                </div>
                
                <div class="w-full md:w-96">
                    <div class="relative">
                        <input type="text" placeholder="Cari event seru..." class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-red-500 focus:border-red-500 outline-none transition shadow-sm">
                        <div class="absolute left-4 top-3.5 text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-10">
        <div class="flex items-center space-x-2 overflow-x-auto pb-4 mb-8 no-scrollbar">
            <button class="px-6 py-2 bg-red-600 text-white rounded-full font-medium shadow-md whitespace-nowrap">Semua</button>
            <button class="px-6 py-2 bg-white text-gray-600 hover:bg-gray-100 rounded-full font-medium border border-gray-200 transition whitespace-nowrap">Music</button>
            <button class="px-6 py-2 bg-white text-gray-600 hover:bg-gray-100 rounded-full font-medium border border-gray-200 transition whitespace-nowrap">Tech</button>
            <button class="px-6 py-2 bg-white text-gray-600 hover:bg-gray-100 rounded-full font-medium border border-gray-200 transition whitespace-nowrap">Career</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition duration-300 flex flex-col">
                <div class="relative overflow-hidden">
                    <a href="/event/1">
                        <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&q=80&w=500" alt="Konser Senja Merdeka" class="w-full h-52 object-cover group-hover:scale-110 transition duration-500">
                    </a>
                    <div class="absolute top-4 right-4">
                        <span class="bg-green-500/90 backdrop-blur-sm text-white text-[10px] uppercase tracking-widest font-bold px-3 py-1.5 rounded-lg shadow-lg">Tersedia</span>
                    </div>
                    <div class="absolute bottom-4 left-4">
                        <span class="bg-white/90 backdrop-blur-sm text-gray-900 text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm italic text-red-600">Music</span>
                    </div>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <div class="flex items-center text-gray-500 text-xs font-bold mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        25 APRIL 2026
                    </div>
                    <a href="/event/1" class="text-xl font-bold text-gray-900 group-hover:text-red-600 transition tracking-tight">Konser Senja Merdeka</a>
                    <p class="text-gray-500 text-sm mt-3 line-clamp-2 leading-relaxed">Nikmati alunan musik indie terbaik di pinggir pantai dengan pemandangan sunset yang memukau.</p>
                    <div class="mt-auto pt-6 flex items-center justify-between border-t border-gray-50">
                        <div>
                            <p class="text-xs text-gray-400 font-medium">HTM</p>
                            <p class="text-lg font-extrabold text-gray-900">Rp 150.000</p>
                        </div>
                        <a href="/event/1" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-900 text-white hover:bg-red-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition duration-300 flex flex-col">
                <div class="relative overflow-hidden">
                    <a href="/event/2">
                        <img src="https://images.unsplash.com/photo-1540575861501-7cf05a4b125a?auto=format&fit=crop&q=80&w=500" alt="Tech Conference 2026" class="w-full h-52 object-cover group-hover:scale-110 transition duration-500">
                    </a>
                    <div class="absolute top-4 right-4">
                        <span class="bg-blue-500/90 backdrop-blur-sm text-white text-[10px] uppercase tracking-widest font-bold px-3 py-1.5 rounded-lg shadow-lg">Coming Soon</span>
                    </div>
                    <div class="absolute bottom-4 left-4">
                        <span class="bg-white/90 backdrop-blur-sm text-gray-900 text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm italic text-blue-600">Technology</span>
                    </div>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <div class="flex items-center text-gray-500 text-xs font-bold mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        12 MEI 2026
                    </div>
                    <a href="/event/2" class="text-xl font-bold text-gray-900 group-hover:text-red-600 transition tracking-tight">Tech Conference 2026</a>
                    <p class="text-gray-500 text-sm mt-3 line-clamp-2 leading-relaxed">Update skill lo tentang AI dan Web3 bareng expert dari berbagai belahan dunia.</p>
                    <div class="mt-auto pt-6 flex items-center justify-between border-t border-gray-50">
                        <div>
                            <p class="text-xs text-gray-400 font-medium">HTM</p>
                            <p class="text-lg font-extrabold text-gray-900">Gratis</p>
                        </div>
                        <a href="/event/2" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-900 text-white hover:bg-red-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition duration-300 flex flex-col">
                <div class="relative overflow-hidden">
                    <a href="/event/3">
                        <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?auto=format&fit=crop&q=80&w=500" alt="Networking Night" class="w-full h-52 object-cover group-hover:scale-110 transition duration-500">
                    </a>
                    <div class="absolute top-4 right-4">
                        <span class="bg-green-500/90 backdrop-blur-sm text-white text-[10px] uppercase tracking-widest font-bold px-3 py-1.5 rounded-lg shadow-lg">Tersedia</span>
                    </div>
                    <div class="absolute bottom-4 left-4">
                        <span class="bg-white/90 backdrop-blur-sm text-gray-900 text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm italic text-green-600">Career</span>
                    </div>
                </div>
                <div class="p-6 flex-grow flex flex-col">
                    <div class="flex items-center text-gray-500 text-xs font-bold mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        02 JUNI 2026
                    </div>
                    <a href="/event/3" class="text-xl font-bold text-gray-900 group-hover:text-red-600 transition tracking-tight">Networking Night</a>
                    <p class="text-gray-500 text-sm mt-3 line-clamp-2 leading-relaxed">Perluas koneksi profesional lo sambil ngopi santai di coworking space hits Jakarta.</p>
                    <div class="mt-auto pt-6 flex items-center justify-between border-t border-gray-50">
                        <div>
                            <p class="text-xs text-gray-400 font-medium">HTM</p>
                            <p class="text-lg font-extrabold text-gray-900">Rp 50.000</p>
                        </div>
                        <a href="/event/3" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-900 text-white hover:bg-red-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        
        <div class="mt-16 flex justify-center">
            <nav class="flex items-center space-x-2">
                <span class="px-4 py-2 bg-red-50 text-red-600 font-bold rounded-lg border border-red-100 shadow-sm">1</span>
                <a href="#" class="px-4 py-2 text-gray-400 hover:bg-gray-100 rounded-lg transition font-medium">2</a>
                <a href="#" class="p-2 text-gray-300 hover:text-red-600 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </nav>
        </div>
    </div>
</div>

<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endsection