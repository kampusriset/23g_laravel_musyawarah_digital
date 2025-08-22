@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="flex items-center justify-center h-screen">
    <div class="bg-[#06142E] text-white w-full max-w-2xl shadow-lg rounded-lg overflow-hidden p-10">
        <h2 class="text-3xl font-semibold mb-8">Login</h2>

        @if(session('success'))
            <div class="bg-green-600 p-2 mb-4 rounded">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="bg-red-600 p-2 mb-4 rounded">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login.create') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm mb-1">Email</label>
                <input type="text" name="email" id="email" required class="w-full px-4 py-2 rounded bg-white text-black focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label for="password" class="block text-sm mb-1">Password</label>
                <input type="password" name="password" id="password" required class="w-full px-4 py-2 rounded bg-white text-black focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div class="flex items-center justify-between text-sm text-gray-300">
                <label>
                    <input type="checkbox" name="remember" class="mr-2"> Remember Me
                </label>
                <a href="#" class="text-blue-400 hover:underline">Forgot Password?</a>
            </div>
            <div class="text-sm text-gray-300">
                Not a user? <a href="{{ route('register.view') }}" class="text-blue-400 hover:underline">Register now</a>
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition duration-200">LOGIN</button>
        </form>
    </div>
</div>
@endsection
