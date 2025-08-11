<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form Registrasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#06142E] min-h-screen flex items-center justify-center text-white">
  <div class="flex bg-[#06142E] w-full max-w-6xl p-6">
    <!-- Illustration -->
    <div class="hidden md:flex items-center justify-center w-1/2">
      <img src="{{ asset('img/SiMUDIlogo.png') }}" alt="Register illustration" class="w-[70%] rounded-full">
    </div>

    <!-- Form -->
    <div class="w-full md:w-1/2 px-8 py-4">
      <h2 class="text-3xl font-semibold mb-6">Form Registrasi</h2>
      <form action="{{ route('register.create') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="nama" placeholder="Nama" required class="w-full px-4 py-2 rounded text-black">
        <input type="text" name="tempat_lahir" placeholder="Tempat Tanggal Lahir" required class="w-full px-4 py-2 rounded text-black">
        <input type="text" name="nama_ortu" placeholder="Nama Bapak / Ibu" required class="w-full px-4 py-2 rounded text-black">
        <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-2 rounded text-black">
        <input type="text" name="no_hp" placeholder="No. Hp" required class="w-full px-4 py-2 rounded text-black">
        <input type="password" name="password" placeholder="Password" required class="w-full px-4 py-2 rounded text-black">
        <input type="password" name="re_password" placeholder="Re-enter Password" required class="w-full px-4 py-2 rounded text-black">
        <input type="text" name="nik" placeholder="No KTP / NIK" required class="w-full px-4 py-2 rounded text-black">
        <div>
        <a href="login.php" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded w-full mt-4">
          SUBMIT
        </a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>