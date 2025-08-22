@extends('layouts.app')

@section('content')
<h2 class="text-2xl mb-4">Voting Realtime</h2>
<div id="voting-list" class="space-y-4">
    @foreach($votings as $voting)
        <div data-id="{{ $voting->id }}" class="border p-3 rounded bg-gray-800">
            <h3 class="font-semibold">{{ $voting->usulan->judul ?? 'Usulan' }}</h3>
            <button class="vote-btn bg-green-600 px-2 py-1 rounded" data-choice="setuju">Setuju</button>
            <button class="vote-btn bg-red-600 px-2 py-1 rounded" data-choice="tidak">Tidak</button>
            <button class="vote-btn bg-gray-600 px-2 py-1 rounded" data-choice="abstain">Abstain</button>
            <p class="mt-2 text-sm text-gray-300">Pilihan: <span class="vote-result">{{ $voting->pilihan ?? '-' }}</span></p>
        </div>
    @endforeach
</div>

<script src="{{ asset('js/voting.js') }}"></script>
<script>
const userId = {{ auth('warga')->id() }};
const wsUrl = 'ws://localhost:3000';
initVoting(wsUrl, userId);
</script>
@endsection
