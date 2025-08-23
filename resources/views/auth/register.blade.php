@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="flex items-center justify-center h-screen my-14">
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
                <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required class="w-full px-4 py-2 rounded text-black bg-white">
      <input type="text" name="username" placeholder="Username" required class="w-full px-4 py-2 rounded text-black bg-white">
      <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-2 rounded text-black bg-white">
      <input type="text"  pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '')" name="phone" placeholder="No. Hp" required class="w-full px-4 py-2 rounded text-black bg-white">
      <div class="relative py-1">
        <select id="kategori" name="gender"
        class="block appearance-none w-full rounded-lg border border-gray-300 bg-white px-4 py-2 pr-10 text-gray-700 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:outline-none">
        <option disabled selected value="">Pilih Gender: </option>
        <option value="L">Laki Laki</option>
        <option value="P">Perempuan</option>
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
@endsection
