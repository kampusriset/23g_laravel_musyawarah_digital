@extends('layouts.app')
@section('title','Edit Notulen')
@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Notulen</h1>
<form method="POST" action="{{ route('warga.notulen.update',$item->id_notulen) }}" class="space-y-3 max-w-3xl">
  @csrf @method('PUT')
  <input name="judul_musyawarah" class="w-full p-3 rounded text-black" value="{{ old('judul_musyawarah',$item->judul_musyawarah) }}">
  <div class="grid sm:grid-cols-2 gap-3">
    <input name="total_hadir" type="number" min="0" class="p-3 rounded text-black" value="{{ old('total_hadir',$item->total_hadir) }}">
    <input name="total_undangan" type="number" min="0" class="p-3 rounded text-black" value="{{ old('total_undangan',$item->total_undangan) }}">
  </div>
  <textarea name="catatan" class="w-full p-3 rounded text-black" rows="5">{{ old('catatan',$item->catatan) }}</textarea>
  <textarea name="hasil_keputusan" class="w-full p-3 rounded text-black" rows="3">{{ old('hasil_keputusan',$item->hasil_keputusan) }}</textarea>

  <select name="status" class="p-3 rounded text-black">
    @foreach(['draft','selesai','ditunda'] as $st)
      <option value="{{ $st }}" @selected($item->status===$st)>{{ ucfirst($st) }}</option>
    @endforeach
  </select>

  <button class="px-4 py-2 bg-[#0561d1] rounded">Update</button>
  <a href="{{ route('warga.notulen.index') }}" class="px-4 py-2 bg-white/10 rounded">Batal</a>
</form>
@endsection
