@extends('layouts.app')
@section('title','Buat Notulen')
@section('content')
<h1 class="text-2xl font-bold mb-4">Buat Notulen</h1>
<form method="POST" action="{{ route('warga.notulen.store') }}" class="space-y-3 max-w-3xl">
  @csrf
  <input name="judul_musyawarah" class="w-full p-3 rounded text-black" placeholder="Judul" value="{{ old('judul_musyawarah') }}">
  @error('judul_musyawarah')<div class="text-red-400 text-sm">{{ $message }}</div>@enderror

  <div class="grid sm:grid-cols-2 gap-3">
    <input name="total_hadir" type="number" min="0" class="p-3 rounded text-black" placeholder="Total Hadir" value="{{ old('total_hadir') }}">
    <input name="total_undangan" type="number" min="0" class="p-3 rounded text-black" placeholder="Total Undangan" value="{{ old('total_undangan') }}">
  </div>

  <textarea name="catatan" class="w-full p-3 rounded text-black" rows="5" placeholder="Catatan">{{ old('catatan') }}</textarea>
  <textarea name="hasil_keputusan" class="w-full p-3 rounded text-black" rows="3" placeholder="Hasil Keputusan">{{ old('hasil_keputusan') }}</textarea>

  <select name="status" class="p-3 rounded text-black">
    <option value="draft">Draft</option>
    <option value="selesai">Selesai</option>
    <option value="ditunda">Ditunda</option>
  </select>

  <button class="px-4 py-2 bg-[#0561d1] rounded">Simpan</button>
  <a href="{{ route('warga.notulen.index') }}" class="px-4 py-2 bg-white/10 rounded">Batal</a>
</form>
@endsection
