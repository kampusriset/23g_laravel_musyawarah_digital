@extends('layouts.app')
@section('title','Buat Usulan')
@section('content')
<h1 class="text-2xl font-bold mb-4">Buat Usulan</h1>
<form method="POST" action="{{ route('warga.voting.store') }}" class="space-y-3 max-w-3xl">
  @csrf
  <input name="judul_usulan" class="w-full p-3 rounded text-black" placeholder="Judul Usulan" value="{{ old('judul_usulan') }}">
  <textarea name="deskripsi" class="w-full p-3 rounded text-black" rows="4" placeholder="Deskripsi">{{ old('deskripsi') }}</textarea>
  <input name="anggaran_estimasi" type="number" min="0" class="w-full p-3 rounded text-black" placeholder="Anggaran (opsional)" value="{{ old('anggaran_estimasi') }}">
  <select name="status_usulan" class="p-3 rounded text-black">
    <option value="draft">draft</option>
    <option value="proses">proses</option>
    <option value="selesai">selesai</option>
  </select>
  <button class="px-4 py-2 bg-[#0561d1] rounded">Simpan</button>
  <a href="{{ route('warga.voting.index') }}" class="px-4 py-2 bg-white/10 rounded">Batal</a>
</form>
@endsection
