@extends('backend.layouts.admin')

@section('title', 'Edit Event')

@section('content')
<div class="max-w-5xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6">Edit Event</h1>

    <form action="/backend/event-management/{{ $event->id }}" method="POST" enctype="multipart/form-data"
          class="bg-white rounded-2xl shadow p-6 space-y-6">
        @csrf
        @method('PUT')

        {{-- BASIC --}}
        <div class="grid md:grid-cols-2 gap-4">
            <input type="text" name="title" value="{{ $event->title }}"
                   class="border p-3 rounded-lg">

            <input type="text" name="category" value="{{ $event->category }}"
                   class="border p-3 rounded-lg">
        </div>

        <textarea name="description"
                  class="border p-3 rounded-lg w-full">{{ $event->description }}</textarea>

        {{-- DATE --}}
        <div class="grid md:grid-cols-2 gap-4">
            <input type="datetime-local" name="start_date"
                   value="{{ date('Y-m-d\TH:i', strtotime($event->start_date)) }}"
                   class="border p-3 rounded-lg">

            <input type="datetime-local" name="end_date"
                   value="{{ date('Y-m-d\TH:i', strtotime($event->end_date)) }}"
                   class="border p-3 rounded-lg">
        </div>

        {{-- DETAIL --}}
        <div class="grid md:grid-cols-3 gap-4">
            <input type="text" name="location" value="{{ $event->location }}"
                   class="border p-3 rounded-lg">

            <input type="number" name="quota" value="{{ $event->quota }}"
                   class="border p-3 rounded-lg">

            <select name="event_type" class="border p-3 rounded-lg">
                @foreach(['umum','freemium','private','plus'] as $type)
                <option value="{{ $type }}" {{ $event->event_type == $type ? 'selected' : '' }}>
                    {{ ucfirst($type) }}
                </option>
                @endforeach
            </select>
        </div>

        {{-- PAYMENT --}}
        <div>
            <label class="flex items-center gap-2">
                <input type="checkbox" id="is_paid" name="is_paid" value="1"
                       {{ $event->is_paid ? 'checked' : '' }}>
                Event Berbayar
            </label>

            <input type="number" name="price" id="price"
                   value="{{ $event->price }}"
                   class="border p-3 rounded-lg w-full mt-2 {{ !$event->is_paid ? 'hidden' : '' }}">
        </div>

        {{-- ACTION --}}
        <div class="flex justify-end gap-3">
            <a href="/backend/event-management" class="px-4 py-2 border rounded-lg">Batal</a>
            <button class="bg-green-600 text-white px-6 py-2 rounded-lg">
                Update
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