@extends('layouts.app')

@section('title', 'Events - Event EO')

@section('content')
    <div class="w-full mx-auto px-4 py-12">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold text-red-500">Our Events</h1>
            <p class="text-gray-600 mt-4">Discover and register for exciting events</p>
        </div>

        <div class="mt-10 bg-white p-8 rounded-lg shadow-md border border-gray-100">
            <h2 class="text-xl font-semibold mb-6 text-gray-800">Form Pendaftaran Event</h2>

            <form action="#" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500 outline-none transition" 
                        placeholder="Masukkan nama lengkap">
                </div>

                <div>
                    <label for="no_telp" class="block text-sm font-medium text-gray-700 mb-1">No. Telepon</label>
                    <input type="tel" name="no_telp" id="no_telp"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500 outline-none transition" 
                        placeholder="0812xxxx">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500 outline-none transition" 
                        placeholder="email@contoh.com">
                </div>

                <div>
                    <label for="nik" class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
                    <input type="number" name="nik" id="nik"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500 outline-none transition" 
                        placeholder="16 digit NIK">
                </div>

                <div class="pt-2">
                    <button type="submit"
                        class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-md transition duration-200 shadow-lg">
                        Daftar Sekarang
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection