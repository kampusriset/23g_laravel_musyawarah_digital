@extends('layouts.app')
@section('title','Tambah Presensi')
@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Presensi</h1>
<form method="POST" action="{{ route('warga.presensi.store') }}" class="space-y-3 max-w-md">
  @csrf
  <input name="agenda_id" type="number" class="w-full p-3 rounded text-black" placeholder="Agenda ID (opsional)" value="{{ old('agenda_id') }}">
  <select name="metode_presensi" class="w-full p-3 rounded text-black">
    <option value="qr">QR</option>
    <option value="kode">Kode</option>
    <option value="manual">Manual</option>
  </select>
  <button class="px-4 py-2 bg-[#0561d1] rounded">Simpan</button>
  <a href="{{ route('warga.presensi.index') }}" class="px-4 py-2 bg-white/10 rounded">Batal</a>
</form>
@endsection
