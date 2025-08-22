@extends('layouts.app')

@section('content')
<div class="text-center py-20">
    <h1 class="text-5xl font-bold text-white">Selamat Datang di Si MUDI</h1>
    <p class="mt-4 text-white">Sistem musyawarah digital, diskusi dan voting realtime.</p>
    <div class="mt-6 space-x-4">
        <a href="{{ route('login.view') }}" class="px-6 py-2 bg-blue-600 rounded hover:bg-blue-700">Login</a>
        <a href="{{ route('register.view') }}" class="px-6 py-2 bg-green-600 rounded hover:bg-green-700">Register</a>
    </div>
</div>
@endsection
