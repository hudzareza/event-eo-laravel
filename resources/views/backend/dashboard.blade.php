@extends('backend.layouts.admin')

@section('title', 'Dashboard EO')

@section('content')
<div class="p-6">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Ringkasan Statistik</h1>
        <p class="text-gray-500">Pantau performa event lo di sini, bro.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Event</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">12</p>
                </div>
                <div class="bg-blue-50 p-3 rounded-lg text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <p class="text-xs text-green-600 mt-4 font-medium">↑ 2 event baru bulan ini</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Tiket Terjual</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">1,240</p>
                </div>
                <div class="bg-red-50 p-3 rounded-lg text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                </div>
            </div>
            <p class="text-xs text-green-600 mt-4 font-medium">↑ 12% dari minggu lalu</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Total Pendapatan</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">Rp 85.2M</p>
                </div>
                <div class="bg-green-50 p-3 rounded-lg text-green-600">
                    <span class="font-bold">Rp</span>
                </div>
            </div>
            <p class="text-xs text-gray-400 mt-4 italic text-sm">Update otomatis</p>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Pendaftar Baru</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">45</p>
                </div>
                <div class="bg-purple-50 p-3 rounded-lg text-purple-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
            <p class="text-xs text-blue-600 mt-4 font-medium">Hari ini</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-50 flex justify-between items-center">
            <h3 class="font-bold text-gray-800">Pendaftar Terakhir</h3>
            <button class="text-sm text-red-600 font-semibold hover:underline">Lihat Semua</button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-bold">
                    <tr>
                        <th class="px-6 py-4 tracking-wider">Nama Peserta</th>
                        <th class="px-6 py-4 tracking-wider">Event</th>
                        <th class="px-6 py-4 tracking-wider">Tanggal Daftar</th>
                        <th class="px-6 py-4 tracking-wider">Status</th>
                        <th class="px-6 py-4 tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center font-bold text-xs">AM</div>
                                <div class="ml-3">
                                    <p class="text-sm font-bold text-gray-900">Amul</p>
                                    <p class="text-xs text-gray-500">amul@dev.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 font-medium">Konser Senja Merdeka</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Baru saja</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-bold uppercase">Lunas</span>
                        </td>
                        <td class="px-6 py-4">
                            <button class="text-gray-400 hover:text-red-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm font-bold text-gray-900">Budi Santoso</td>
                        <td class="px-6 py-4 text-sm text-gray-600">Tech Conference</td>
                        <td class="px-6 py-4 text-sm text-gray-500">2 jam yang lalu</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-[10px] font-bold uppercase">Pending</span>
                        </td>
                        <td class="px-6 py-4">
                            <button class="text-gray-400 hover:text-red-600">...</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection