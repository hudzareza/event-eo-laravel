@extends('backend.layouts.admin')

@section('title', 'Pendaftar: Konser Senja Merdeka')

@section('content')
<div class="p-8">
    <div class="mb-8">
        <nav class="text-sm font-medium text-gray-500 mb-2">
            <a href="/dashboard/peserta" class="hover:text-red-600">Data Peserta</a> 
            <span class="mx-2">/</span> 
            <span class="text-gray-900">Konser Senja Merdeka</span>
        </nav>
        <div class="flex justify-between items-end">
            <div>
                <h1 class="text-2xl font-black text-gray-900 italic">LIST REGISTRASI</h1>
                <p class="text-gray-500 text-sm">Total 450 orang mendaftar untuk event ini.</p>
            </div>
            <div class="flex space-x-3">
                <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-bold flex items-center transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Export Excel
                </button>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50 border-b border-gray-100 text-[10px] uppercase font-black tracking-widest text-gray-400">
                    <tr>
                        <th class="px-6 py-4">Nama Lengkap</th>
                        <th class="px-6 py-4">No. Telp / WhatsApp</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">NIK</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4">
                            <p class="text-sm font-bold text-gray-900">Budi Santoso</p>
                            <span class="text-[10px] text-gray-400 font-mono italic uppercase">REF-001923</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">081234567890</td>
                        <td class="px-6 py-4 text-sm text-gray-600">budi.s@gmail.com</td>
                        <td class="px-6 py-4 text-sm text-gray-500 font-mono">3271000000000001</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-red-500 hover:text-red-700 font-bold text-xs uppercase tracking-tighter">Hapus</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4">
                            <p class="text-sm font-bold text-gray-900">Siti Aminah</p>
                            <span class="text-[10px] text-gray-400 font-mono italic uppercase">REF-001924</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">08987654321</td>
                        <td class="px-6 py-4 text-sm text-gray-600">siti.aminah@yahoo.com</td>
                        <td class="px-6 py-4 text-sm text-gray-500 font-mono">3271000000000002</td>
                        <td class="px-6 py-4 text-right">
                            <button class="text-red-500 hover:text-red-700 font-bold text-xs uppercase tracking-tighter">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection