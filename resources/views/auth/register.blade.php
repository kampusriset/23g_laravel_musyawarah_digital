@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="flex items-center justify-center h-screen">
    <div class="bg-[#06142E] text-white w-full max-w-2xl shadow-lg rounded-lg overflow-hidden p-10">
        <h2 class="text-3xl font-semibold mb-8">Register</h2>

        @if($errors->any())
            <div class="bg-red-600 p-2 mb-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.create') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="username" class="block text-sm mb-1">Username</label>
                <input type="text" name="username" id="username" required class="w-full px-4 py-2 rounded bg-white text-black focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label for="nama_lengkap" class="block text-sm mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" required class="w-full px-4 py-2 rounded bg-white text-black focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label for="email" class="block text-sm mb-1">Email</label>
                <input type="email" name="email" id="email" required class="w-full px-4 py-2 rounded bg-white text-black focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label for="password" class="block text-sm mb-1">Password</label>
                <input type="password" name="password" id="password" required class="w-full px-4 py-2 rounded bg-white text-black focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label for="password_confirmation" class="block text-sm mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full px-4 py-2 rounded bg-white text-black focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded transition duration-200">REGISTER</button>
        </form>
    </div>
</div>
@endsection
