@extends('layouts.app')
@section('title','Presensi')
@section('content')
<div class="flex justify-between items-center mb-4">
  <h1 class="text-2xl font-bold">Presensi Saya</h1>
  <a href="{{ route('warga.presensi.create') }}" class="bg-[#0561d1] px-4 py-2 rounded">Tambah Presensi</a>
</div>

@if(session('success'))
<div class="bg-emerald-600/20 border border-emerald-600/40 p-3 rounded mb-3">{{ session('success') }}</div>
@endif

<div class="space-y-3">
@foreach($items as $p)
  <div class="bg-[#06142E] p-4 rounded flex justify-between">
    <div>
      <div class="font-semibold">Agenda: {{ $p->agenda_id ?? '-' }}</div>
      <div class="text-white/70 text-sm">Metode: {{ $p->metode_presensi }}</div>
      <div class="text-white/60 text-sm">{{ $p->waktu_hadir?->format('d M Y H:i') }}</div>
    </div>
    <form method="POST" action="{{ route('warga.presensi.destroy',$p->id_presensi) }}" onsubmit="return confirm('Hapus presensi ini?')">
      @csrf @method('DELETE')
      <button class="px-3 py-1 bg-red-600 rounded">Hapus</button>
    </form>
  </div>
@endforeach
</div>

<div class="mt-4">{{ $items->links() }}</div>
@endsection
