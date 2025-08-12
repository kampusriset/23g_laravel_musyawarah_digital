<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form Registrasi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @include('sweetalert::alert')
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
        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required class="w-full px-4 py-2 rounded text-black bg-white">
        <input type="text" name="username" placeholder="Username" required class="w-full px-4 py-2 rounded text-black bg-white">
        <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-2 rounded text-black bg-white">
        <input type="text"  pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="no_hp" placeholder="No. Hp" required class="w-full px-4 py-2 rounded text-black bg-white">
        <div class="relative  mt-10">
          <select id="kategori" name="gender"
          class="block appearance-none w-full rounded-lg border border-gray-300 bg-white px-4 py-2 pr-10 text-gray-700 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none">
          <option disabled selected>Pilih Gender: </option>
          <option value="M">Laki Laki</option>
          <option value="F">Perempuan</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-gray-500">
          ▼
        </div>
      </div>
      <input type="password" name="password" placeholder="Password" required class="w-full px-4 py-2 bg-white rounded text-black">
      <input type="password" name="re_password" placeholder="Re-enter Password" required class="w-full px-4 py-2 bg-white rounded text-black">
      <div>
        <button type="submit"class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded w-full mt-4">
          SUBMIT
        </button>
      </div>
    </form>
  </div>
</div>
</body>
</html>