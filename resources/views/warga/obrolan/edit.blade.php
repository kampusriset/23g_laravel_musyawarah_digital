@extends('layouts.app')
@section('title','Edit Pesan')
@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Pesan #{{ $item->id_obrolan }}</h1>
<form method="POST" action="{{ route('warga.obrolan.update',$item->id_obrolan) }}" enctype="multipart/form-data" class="space-y-3 max-w-2xl">
  @csrf @method('PUT')
  <textarea name="pesan" class="w-full p-3 rounded text-black" rows="5">{{ old('pesan',$item->pesan) }}</textarea>
  @error('pesan')<div class="text-red-400 text-sm">{{ $message }}</div>@enderror

  @if($item->file_path)
    <div class="text-sm text-white/70">Lampiran saat ini: {{ $item->file_name }}</div>
  @endif
  <div><input type="file" name="file" class="text-white"></div>
  @error('file')<div class="text-red-400 text-sm">{{ $message }}</div>@enderror

  <button class="px-4 py-2 bg-[#0561d1] rounded">Update</button>
  <a href="{{ route('warga.obrolan.index') }}" class="px-4 py-2 bg-white/10 rounded">Batal</a>
</form>
@endsection
