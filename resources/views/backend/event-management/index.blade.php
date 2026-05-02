@extends('backend.layouts.admin')

@section('title', 'List Event')

@section('content')
<div class="p-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Event Management</h1>
            <p class="text-gray-500 text-sm">Kelola semua event</p>
        </div>

        <a href="/backend/event-management/create"
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition">
            + Buat Event
        </a>
    </div>
    <div class="mb-6">
        <input type="text" placeholder="Cari event..." class="border px-3 py-2 rounded-lg text-sm">
    </div>
    {{-- TABLE --}}
    <div class="bg-white rounded-2xl shadow overflow-hidden border border-gray-100">

        <div class="overflow-x-auto">
            <table class="w-full text-sm">

                {{-- HEADER --}}
                <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3 text-left">Event</th>
                        <th class="px-4 py-3 text-left">Tanggal</th>
                        <th class="px-4 py-3 text-left">Quota</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody class="divide-y">
                    @foreach($events as $event)
                    <tr class="hover:bg-gray-50 transition">

                        {{-- EVENT --}}
                        <td class="px-4 py-3 flex items-center gap-3">
                            {{-- Thumbnail --}}
                            <div class="w-12 h-12 rounded-lg bg-gray-200 overflow-hidden">
                                @if($event->thumbnail)
                                <img src="{{ asset('storage/'.$event->thumbnail) }}"
                                     class="w-full h-full object-cover">
                                @endif
                            </div>

                            <div>
                                <p class="font-semibold text-gray-800">
                                    {{ $event->title }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ $event->category ?? '-' }}
                                </p>
                            </div>
                        </td>

                        {{-- DATE --}}
                        <td class="px-4 py-3 text-gray-600">
                            {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}
                            <br>
                            <span class="text-xs text-gray-400">
                                {{ \Carbon\Carbon::parse($event->start_date)->format('H:i') }}
                            </span>
                        </td>

                        {{-- QUOTA --}}
                        <td class="px-4 py-3">
                            <span class="font-semibold">
                                {{ $event->registered_count ?? 0 }}
                            </span>
                            /
                            {{ $event->quota ?? '∞' }}
                            <div class="w-24 bg-gray-200 rounded-full h-2">
                                <div class="bg-indigo-600 h-2 rounded-full"
                                    style="width: {{ ($event->quota ? ($event->registered_count / $event->quota)*100 : 0) }}%">
                                </div>
                            </div>
                        </td>

                        {{-- STATUS --}}
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs rounded-full font-semibold
                                @if($event->status == 'published') bg-green-100 text-green-700
                                @elseif($event->status == 'draft') bg-yellow-100 text-yellow-700
                                @else bg-gray-200 text-gray-600
                                @endif">
                                {{ strtoupper($event->status) }}
                            </span>
                        </td>

                        {{-- ACTION --}}
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">

                                <a href="/backend/event-management/{{ $event->id }}"
                                   class="text-blue-600 hover:underline text-xs">
                                    Detail
                                </a>

                                <a href="/backend/event-management/{{ $event->id }}/edit"
                                   class="text-yellow-600 hover:underline text-xs">
                                    Edit
                                </a>

                                <form action="/backend/event-management/{{ $event->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline text-xs"
                                        onclick="return confirm('Hapus event ini?')">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
                {{ $events->links() }}
            </table>
        </div>

    </div>
</div>
@endsection