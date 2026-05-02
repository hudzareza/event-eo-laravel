@extends('backend.layouts.admin')

@section('title', 'Create Event')

@section('content')
<div class="max-w-5xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">Buat Event</h1>

    <form action="/backend/event-management" method="POST" enctype="multipart/form-data"
          class="bg-white rounded-2xl shadow p-6 space-y-6">
        @csrf

        {{-- BASIC --}}
        <div>
            <h2 class="font-semibold mb-3 text-gray-700">Informasi Event</h2>

            <div class="grid md:grid-cols-2 gap-4">
                <input type="text" name="title" placeholder="Judul Event"
                       class="border p-3 rounded-lg w-full">

                <input type="text" name="category" placeholder="Kategori"
                       class="border p-3 rounded-lg w-full">
            </div>

            <textarea name="description" placeholder="Deskripsi Event"
                      class="border p-3 rounded-lg w-full mt-4"></textarea>
        </div>

        {{-- DATE --}}
        <div>
            <h2 class="font-semibold mb-3 text-gray-700">Jadwal</h2>

            <div class="grid md:grid-cols-2 gap-4">
                <input type="datetime-local" name="start_date"
                       class="border p-3 rounded-lg">

                <input type="datetime-local" name="end_date"
                       class="border p-3 rounded-lg">
            </div>
        </div>

        {{-- DETAIL --}}
        <div>
            <h2 class="font-semibold mb-3 text-gray-700">Detail</h2>

            <div class="grid md:grid-cols-3 gap-4">
                <input type="text" name="location" placeholder="Lokasi"
                       class="border p-3 rounded-lg">

                <input type="number" name="quota" placeholder="Quota"
                       class="border p-3 rounded-lg">

                <select name="event_type" class="border p-3 rounded-lg">
                    <option value="umum">Umum</option>
                    <option value="freemium">Freemium</option>
                    <option value="private">Private</option>
                    <option value="plus">Plus</option>
                </select>
            </div>
        </div>

        <select name="client_id" required>
            <option value="">Pilih Client</option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->name }}</option>
            @endforeach
        </select>

        {{-- PAYMENT --}}
        <div>
            <h2 class="font-semibold mb-3 text-gray-700">Pembayaran</h2>

            <div class="flex items-center gap-3 mb-3">
                <input type="checkbox" id="is_paid" name="is_paid" value="1">
                <label for="is_paid">Event Berbayar</label>
            </div>

            <input type="number" name="price" id="price"
                   placeholder="Harga"
                   class="border p-3 rounded-lg w-full hidden">
        </div>

        {{-- MEDIA --}}
        <div>
            <h2 class="font-semibold mb-3 text-gray-700">Thumbnail</h2>

            <input type="file" name="thumbnail"
                   class="border p-3 rounded-lg w-full">
        </div>

        {{-- ACTION --}}
        <div class="flex justify-end gap-3">
            <a href="/backend/event-management"
               class="px-4 py-2 border rounded-lg">Batal</a>

            <button class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700">
                Simpan
            </button>
        </div>
    </form>
</div>

<script>
document.getElementById('is_paid').addEventListener('change', function(){
    document.getElementById('price').classList.toggle('hidden', !this.checked);
});
</script>
@endsection