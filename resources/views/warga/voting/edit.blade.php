@extends('layouts.app')
@section('title','Edit Usulan')
@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Usulan</h1>
<form method="POST" action="{{ route('warga.voting.update',$item->id_usulan) }}" class="space-y-3 max-w-3xl">
  @csrf @method('PUT')
  <input name="judul_usulan" class="w-full p-3 rounded text-black" value="{{ old('judul_usulan',$item->judul_usulan) }}">
  <textarea name="deskripsi" class="w-full p-3 rounded text-black" rows="4">{{ old('deskripsi',$item->deskripsi) }}</textarea>
  <input name="anggaran_estimasi" type="number" min="0" class="w-full p-3 rounded text-black" value="{{ old('anggaran_estimasi',$item->anggaran_estimasi) }}">
  <select name="status_usulan" class="p-3 rounded text-black">
    @foreach(['draft','proses','selesai'] as $st)
      <option value="{{ $st }}" @selected($item->status_usulan===$st)>{{ $st }}</option>
    @endforeach
  </select>
  <button class="px-4 py-2 bg-[#0561d1] rounded">Update</button>
  <a href="{{ route('warga.voting.index') }}" class="px-4 py-2 bg-white/10 rounded">Batal</a>
</form>
@endsection
