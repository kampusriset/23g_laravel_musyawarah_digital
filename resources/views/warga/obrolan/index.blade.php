@extends('layouts.app')
@section('title','Obrolan')
@section('content')
<div class="flex justify-between items-center mb-4">
  <h1 class="text-2xl font-bold">Obrolan</h1>
  <a href="{{ route('warga.obrolan.create') }}" class="bg-[#0561d1] px-4 py-2 rounded">Tulis Pesan</a>
</div>

@if(session('success'))
<div class="bg-emerald-600/20 border border-emerald-600/40 p-3 rounded mb-3">{{ session('success') }}</div>
@endif

<div class="space-y-3">
  @foreach($items as $msg)
  <div class="bg-[#06142E] p-4 rounded">
    <div class="text-white/70 text-sm mb-1">
      <strong>{{ $msg->warga->username ?? 'Warga' }}</strong> • #{{ $msg->id_obrolan }} • {{ $msg->created_at->format('d M Y H:i') }}
    </div>
    <div class="whitespace-pre-line">{{ $msg->pesan }}</div>

    @if($msg->file_path)
      <div class="mt-2">
        @php $url = asset('storage/'.$msg->file_path); @endphp
        @if(Str::of($msg->file_name)->lower()->endsWith(['.png','.jpg','.jpeg','.gif','.webp']))
          <img src="{{ $url }}" class="max-h-60 rounded border border-white/10">
        @else
          <a href="{{ $url }}" target="_blank" class="text-blue-400 underline">{{ $msg->file_name }} ({{ number_format($msg->file_size/1024,1) }} KB)</a>
        @endif
      </div>
    @endif

    @if($msg->warga_id === auth()->id())
      <div class="mt-3 flex gap-2">
        <a class="px-3 py-1 bg-white/10 rounded" href="{{ route('warga.obrolan.edit',$msg->id_obrolan) }}">Edit</a>
        <form method="POST" action="{{ route('warga.obrolan.destroy',$msg->id_obrolan) }}" onsubmit="return confirm('Hapus pesan ini?')">
          @csrf @method('DELETE')
          <button class="px-3 py-1 bg-red-600 rounded">Hapus</button>
        </form>
      </div>
    @endif
  </div>
  @endforeach
</div>

<div class="mt-4">{{ $items->links() }}</div>
@endsection
