@extends('layouts.app')

@section('content')
<h2 class="text-2xl mb-4">Presensi Realtime</h2>

<div id="presensi-list" class="space-y-4">
    @foreach($presensis as $p)
        <div class="border p-3 rounded bg-gray-800">{{ $p->warga->username ?? '-' }} hadir: {{ $p->waktu_hadir }}</div>
    @endforeach
</div>

<input type="text" id="presensi-code" placeholder="Scan QR / Masukkan kode" class="w-full px-3 py-2 rounded bg-gray-800 text-white mb-2">
<button id="mark-presensi" class="bg-blue-600 px-4 py-2 rounded mb-4">Presensi</button>

<script src="{{ asset('js/presensi.js') }}"></script>
<script>
const userId = {{ auth('warga')->id() }};
const wsUrl = 'ws://localhost:3000';
initPresensi(wsUrl, userId);
</script>
@endsection
