<header class="bg-[#0561d1]">
 <nav class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 flex items-center justify-between h-16">
  <div class="flex items-center space-x-3">
   <img alt="Logo" class="w-8 h-8" src="{{ asset('storage/img/logo.png') }}"/>
   <span class="text-white font-semibold text-lg select-none">Si MUDI</span>
  </div>
  <ul class="hidden md:flex space-x-8 text-white text-sm">
    @auth
      <li><a href="{{ route('warga.home') }}">Home</a></li>
      <li><a href="{{ route('warga.obrolan.index') }}">Obrolan</a></li>
      <li><a href="{{ route('warga.notulen.index') }}">Notulensi</a></li>
      <li><a href="{{ route('warga.voting.index') }}">Voting</a></li>
      <li><a href="{{ route('warga.presensi.index') }}">Presensi</a></li>
    @else
      <li><a href="{{ route('guest.home') }}">Home</a></li>
      <li><a href="{{ route('guest.about') }}">About</a></li>
      <li><a href="{{ route('guest.contact') }}">Contact</a></li>
    @endauth
  </ul>
  <div class="flex items-center gap-2">
    @auth
      <span class="hidden sm:inline">Hi, {{ auth()->user()->nama_lengkap }}</span>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="px-3 py-1 bg-red-600 rounded">Logout</button>
      </form>
    @else
      <a class="px-3 py-1 bg-white/10 rounded" href="{{ route('login.view') }}">Login</a>
      <a class="px-3 py-1 bg-white/10 rounded" href="{{ route('register.view') }}">Register</a>
    @endauth
  </div>
 </nav>
</header>
