@extends('layouts.app')
@section('title','Tulis Pesan')
@section('content')
<h1 class="text-2xl font-bold mb-4">Tulis Pesan</h1>
<form method="POST" action="{{ route('warga.obrolan.store') }}" enctype="multipart/form-data" class="space-y-3 max-w-2xl">
  @csrf
  {{-- <input type="hidden" name="agenda_id" value="{{ $agenda->id }}"> --}}

  <textarea name="pesan" class="w-full p-3 rounded text-black" rows="5" placeholder="Tulis pesan...">{{ old('pesan') }}</textarea>
  @error('pesan')<div class="text-red-400 text-sm">{{ $message }}</div>@enderror

  <div>
    <input type="file" name="file" class="text-white">
    <p class="text-xs text-white/60 mt-1">Opsional. Maks 20MB.</p>
    @error('file')<div class="text-red-400 text-sm">{{ $message }}</div>@enderror
  </div>

  <button class="px-4 py-2 bg-[#0561d1] rounded">Simpan</button>
  <a href="{{ route('warga.obrolan.index') }}" class="px-4 py-2 bg-white/10 rounded">Batal</a>
</form>
@endsection
