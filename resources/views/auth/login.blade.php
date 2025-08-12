<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    {{-- {{ session('success') }} --}}
</head>
<body class="bg-[#06142E] h-screen flex items-center justify-center">
      @if(session('success'))
  <script>
  window.onload = function(){
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: "{{ session('success') }}",
      showConfirmButton: true
    });
  };
  </script>
@endif

@if(session('error'))
<script>
  window.onload = function(){
  Swal.fire({
    icon: 'error',
    title: 'Gagal!',
    text: "{{ session('error') }}",
    showConfirmButton: true
  });
};
</script>
@endif
    <div class="flex bg-[#06142E] text-white w-full max-w-5xl shadow-lg rounded-lg overflow-hidden">
        <!-- Left Illustration -->
        <div class="hidden md:flex flex-col items-center justify-center w-1/2 p-10">
            <img src="{{ asset("img/SiMUDIlogo.png") }}" alt="Illustration" class="w-4/5 rounded-full">
        </div>
        
        <!-- Right Login Form -->
        <div class="w-full md:w-1/2 bg-[#06142E] p-10">
            <h2 class="text-3xl font-semibold mb-8">Login</h2>
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
                <div class="text-sm text-gray-300">
                    <a href="forgot_password.php" class="text-blue-400 hover:underline">Forgot Password?</a>
                </div>
                <div class="text-sm text-gray-300">
                    Not a user? <a href="{{ route('register.view') }}" class="text-blue-400 hover:underline">Register now</a>
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded transition duration-200">LOGIN</button>
            </form>
        </div>
    </div>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>