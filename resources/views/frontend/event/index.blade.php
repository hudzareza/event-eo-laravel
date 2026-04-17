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

        <div id="eventList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            


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
<script src="{{ asset('js/api.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', loadEvents);

async function loadEvents() {
    try {
        const { res, data } = await apiFetch('/api/events');
        console.log(res);
        console.log(data);
        
        if (!res.ok) {
            alert('Gagal load event');
            return;
        }

        renderEvents(data);
    } catch (err) {
        console.error(err);
        alert('Terjadi kesalahan');
    }
}

function renderEvents(events) {
    const container = document.getElementById('eventList');
    container.innerHTML = '';

    if (events.length === 0) {
        container.innerHTML = '<p class="text-gray-500">Belum ada event</p>';
        return;
    }

    events.forEach(event => {
        container.innerHTML += `
        <div class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition duration-300 flex flex-col">
            
            <div class="relative overflow-hidden">
                <a href="/event/${event.id}">
                    <img src="${event.thumbnail ?? 'https://via.placeholder.com/500'}" 
                         class="w-full h-52 object-cover group-hover:scale-110 transition duration-500">
                </a>

                <div class="absolute top-4 right-4">
                    <span class="bg-green-500/90 text-white text-[10px] px-3 py-1.5 rounded-lg">
                        ${event.status ?? 'Available'}
                    </span>
                </div>

                <div class="absolute bottom-4 left-4">
                    <span class="bg-white text-xs px-3 py-1.5 rounded-lg text-red-600">
                        ${event.category ?? 'General'}
                    </span>
                </div>
            </div>

            <div class="p-6 flex-grow flex flex-col">
                <div class="text-gray-500 text-xs mb-3">
                    ${formatDate(event.start_date)}
                </div>

                <a href="/event/${event.id}" class="text-xl font-bold text-gray-900 hover:text-red-600">
                    ${event.title}
                </a>

                <p class="text-gray-500 text-sm mt-3 line-clamp-2">
                    ${event.description ?? '-'}
                </p>

                <div class="mt-auto pt-6 flex justify-between border-t">
                    <div>
                        <p class="text-xs text-gray-400">HTM</p>
                        <p class="text-lg font-bold">
                            ${formatPrice(event.price)}
                        </p>
                    </div>

                    <a href="/event/${event.id}" 
                       class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-900 text-white hover:bg-red-600">
                        →
                    </a>
                </div>
            </div>
        </div>
        `;
    });
}

function formatDate(date) {
    if (!date) return '-';
    return new Date(date).toLocaleDateString('id-ID', {
        day: '2-digit',
        month: 'long',
        year: 'numeric'
    });
}

function formatPrice(price) {
    if (!price || price == 0) return 'Gratis';
    return 'Rp ' + Number(price).toLocaleString('id-ID');
}
</script>
<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
@endsection