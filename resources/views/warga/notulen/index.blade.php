@extends('layouts.app')
@section('title','Notulensi')
@section('content')
<div class="flex justify-between items-center mb-4">
  <h1 class="text-2xl font-bold">Notulensi</h1>
  <a href="{{ route('warga.notulen.create') }}" class="bg-[#0561d1] px-4 py-2 rounded">Buat Notulen</a>
</div>

@if(session('success'))
<div class="bg-emerald-600/20 border border-emerald-600/40 p-3 rounded mb-3">{{ session('success') }}</div>
@endif

<div class="space-y-3">
@foreach($items as $n)
  <div class="bg-[#06142E] p-4 rounded">
    <div class="flex justify-between">
      <div>
        <div class="font-semibold">{{ $n->judul_musyawarah }}</div>
        <div class="text-white/60 text-sm">Status: {{ ucfirst($n->status) }} • {{ $n->created_at->format('d M Y') }}</div>
      </div>
      <div class="flex gap-2">
        <a href="{{ route('warga.notulen.edit',$n->id_notulen) }}" class="px-3 py-1 bg-white/10 rounded">Edit</a>
        <form method="POST" action="{{ route('warga.notulen.destroy',$n->id_notulen) }}" onsubmit="return confirm('Hapus notulen?')">
          @csrf @method('DELETE')
          <button class="px-3 py-1 bg-red-600 rounded">Hapus</button>
        </form>
      </div>
    </div>
    @if($n->catatan)
      <div class="mt-2 text-white/80 whitespace-pre-line">{{ Str::limit($n->catatan,200) }}</div>
    @endif
  </div>
@endforeach
</div>

<div class="mt-4">{{ $items->links() }}</div>
@endsection
