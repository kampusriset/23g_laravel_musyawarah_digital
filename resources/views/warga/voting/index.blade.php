@extends('layouts.app')
@section('title','Voting')
@section('content')
<div class="flex justify-between items-center mb-4">
  <h1 class="text-2xl font-bold">Voting</h1>
  <a href="{{ route('warga.voting.create') }}" class="bg-[#0561d1] px-4 py-2 rounded">Buat Usulan</a>
</div>

@if(session('success'))
<div class="bg-emerald-600/20 border border-emerald-600/40 p-3 rounded mb-3">{{ session('success') }}</div>
@endif

<div class="space-y-3">
@foreach($usulan as $u)
  <div class="bg-[#06142E] p-4 rounded">
    <div class="flex justify-between">
      <div>
        <div class="font-semibold">{{ $u->judul_usulan }}</div>
        <div class="text-white/70 text-sm">Anggaran: {{ $u->anggaran_estimasi ? number_format($u->anggaran_estimasi,0,',','.') : '-' }}</div>
        <div class="text-white/60 text-sm">Status: {{ $u->status_usulan }}</div>
      </div>
      <div class="text-sm">
        <div>Setuju: <strong>{{ $u->total_setuju }}</strong></div>
        <div>Tidak: <strong>{{ $u->total_tidak }}</strong></div>
        <div>Abstain: <strong>{{ $u->total_abstain }}</strong></div>
      </div>
    </div>

    <form method="POST" action="{{ route('warga.voting.vote',$u->id_usulan) }}" class="mt-3 flex flex-wrap items-center gap-2">
      @csrf
      <select name="pilihan" class="p-2 rounded text-black">
        <option value="setuju">Setuju</option>
        <option value="tidak">Tidak</option>
        <option value="abstain">Abstain</option>
      </select>
      <input name="komentar" class="p-2 rounded text-black flex-1 min-w-[200px]" placeholder="Komentar (opsional)">
      <button class="px-3 py-2 bg-[#0561d1] rounded">Vote</button>
    </form>

    @if($u->warga_id === auth()->id())
    <div class="mt-3 flex gap-2">
      <a href="{{ route('warga.voting.edit',$u->id_usulan) }}" class="px-3 py-1 bg-white/10 rounded">Edit</a>
      <form method="POST" action="{{ route('warga.voting.destroy',$u->id_usulan) }}" onsubmit="return confirm('Hapus usulan ini?')">
        @csrf @method('DELETE')
        <button class="px-3 py-1 bg-red-600 rounded">Hapus</button>
      </form>
    </div>
    @endif
  </div>
@endforeach
</div>

<div class="mt-4">{{ $usulan->links() }}</div>
@endsection
