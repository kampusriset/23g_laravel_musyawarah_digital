<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Si MUDI</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
<style>body{font-family:'Inter',sans-serif;}</style>
</head>
<body class="bg-[#03162a] text-white">
<header class="bg-[#0561d1]">
  <nav class="max-w-7xl mx-auto px-6 flex items-center justify-between h-16">
    <div class="flex items-center space-x-3">
      <img src="https://storage.googleapis.com/a1aa/image/5361c795-5229-43d6-ab3e-7b4ffdff2ff5.jpg" class="w-8 h-8">
      <span class="text-white font-semibold text-lg select-none">Si MUDI</span>
    </div>
    <ul class="hidden md:flex space-x-10 text-white text-sm font-normal">
      <li><a href="{{ route('warga.home') }}">Home</a></li>
      <li><a href="{{ route('warga.chat') }}">Chat</a></li>
      <li><a href="{{ route('warga.notulen') }}">Notulen</a></li>
      <li><a href="{{ route('warga.voting') }}">Voting</a></li>
      <li><a href="{{ route('warga.presensi') }}">Presensi</a></li>
    </ul>
    <div>
      @auth('warga')
        <form action="{{ route('logout') }}" method="POST">@csrf <button type="submit">Logout</button></form>
      @endauth
    </div>
  </nav>
</header>
<main class="max-w-7xl mx-auto px-6 py-10">
  @yield('content')
</main>
</body>
</html>
