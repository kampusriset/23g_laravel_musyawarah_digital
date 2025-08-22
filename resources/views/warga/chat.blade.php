@extends('layouts.app')

@section('content')
<h2 class="text-2xl mb-4">Chat Realtime</h2>
<div id="chat-box" class="h-96 overflow-auto border p-4 mb-4"></div>
<input type="text" id="chat-input" placeholder="Ketik pesan..." class="w-full px-3 py-2 rounded bg-gray-800 text-white">
<button id="send-btn" class="mt-2 bg-blue-600 px-4 py-2 rounded">Kirim</button>

<script src="{{ asset('js/chat.js') }}"></script>
<script>
const userId = {{ auth('warga')->id() }};
const wsUrl = 'ws://localhost:3000';
initChat(wsUrl, userId);
</script>
@endsection
