@extends('layouts.app')

@section('content')
<h2 class="text-2xl mb-4">Notulensi Realtime</h2>

<div id="notulen-list" class="space-y-4 mb-4">
    @foreach($notulens as $notulen)
        <div data-id="{{ $notulen->id }}" class="border p-3 rounded bg-gray-800">
            <h3 class="font-semibold">{{ $notulen->judul_musyawarah }}</h3>
            <textarea class="w-full bg-gray-700 text-white p-2 rounded">{{ $notulen->catatan }}</textarea>
        </div>
    @endforeach
</div>

<input type="text" id="notulen-judul" placeholder="Judul musyawarah" class="w-full px-3 py-2 rounded bg-gray-800 text-white mb-2">
<button id="add-notulen" class="bg-blue-600 px-4 py-2 rounded mb-4">Tambah Notulensi</button>

<script src="{{ asset('js/notulen.js') }}"></script>
<script>
const userId = {{ auth('warga')->id('id_warga') }};
const wsUrl = 'ws://localhost:3000';
initNotulen(wsUrl, userId);
</script>
@endsection
