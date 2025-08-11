<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Si MUDI - Home Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#001528] text-white min-h-screen flex flex-col">
 
  <nav class="flex justify-end space-x-8 p-6 font-semibold items-center">
    <a href="#" class="hover:underline">Tentang Kami</a>
    <a href="#" class="hover:underline">Contact</a>
    <a href="{{ route('login.view') }}" class="bg-blue-600 hover:bg-blue-700 transition rounded-md px-4 py-2 font-semibold">Login</a>
  </nav>

  <main class="flex flex-1 justify-center items-center px-6 h-56">
    <section class="flex flex-col md:flex-row items-center gap-12 max-w-7xl w-full">

      <div class="bg-white rounded-full w-72 h-72 flex flex-col justify-center items-center p-0 shrink-0 shadow-lg relative">
        <img src="{{asset('img/SiMUDIlogo.png')}}"alt= "SiMUDI official logo." 
          class="max-w-[70%] max-h-[70%] object-contain" onerror="this.onerror=null;this.src='https://placehold.co/280x280?text=Logo+Unavailable'"/>
      </div>

      <div class="flex flex-col max-w-xl">
        <p class="text-xl md:text-2xl mb-3">Suaramu membawa perubahan</p>
        <h1 class="text-6xl md:text-7xl font-bold text-transparent bg-clip-text bg-orange-500 mb-6 select-none">Si MUDI</h1>
        <a href="{{ route('register.view') }}" class="self-start bg-blue-600 hover:bg-blue-700 transition rounded-md px-6 py-3 text-white font-semibold uppercase tracking-wide">Register</a>
      </div>
    </section>
  </main>
  <footer class="bg-[#031426]  mt-8 rounded-md px-8 py-8 text-gray-400  font-playfair">
   <div class="flex flex-col md:flex-row md:justify-between lg:justify-evenly md:space-x-12">
    <div class="flex flex-col space-y-3 mb-6 md:mb-0">
     <div>
      <p class="font-semibold text-gray-400">
       Contact
      </p>
      <p>
       0899 9999 12
      </p>
      <p>
       0899 9999 43
      </p>
     </div>
     <div>
      <p class="font-semibold text-gray-400">
       Helpline Number:
      </p>
      <p>
       0899 1231 16
      </p>
      <p>
       0899 1234 47
      </p>
     </div>
     <div>
      <p class="font-semibold text-gray-400">
       Email:
      </p>
      <a href="mailto:compadmin2@gmail.co.id">
       compadmin2@gmail.co.id
      </a>
      <a href="mailto:info@kampungmudi.com">
       info@kampungmudi.com
      </a>
     </div>
    </div>
    <div class="flex flex-col space-y-3 mb-6 md:mb-0">
     <p class="font-semibold text-gray-400">
      Quick
     </p>
     <a class="hover:underline" href="#">
      Register
     </a>
     <a class="hover:underline" href="#">
      Login
     </a>
    </div>
    <div class="flex flex-col space-y-3 mb-6 md:mb-0">
     <p class="font-semibold text-gray-400">
      Know more
     </p>
     <a class="hover:underline" href="#">
      Features
     </a>
     <a class="hover:underline" href="#">
      About
     </a>
     <a class="hover:underline" href="#">
      Steps
     </a>
    </div>
    <div class="flex flex-col space-y-3 mb-6 md:mb-0">
     <p class="font-semibold text-gray-400">
      Follow Us
     </p>
     <a class="hover:underline" href="#">
      Facebook
     </a>
     <a class="hover:underline" href="#">
      Instagram
     </a>
     <a class="hover:underline" href="#">
      Twitter
     </a>
    </div>
    <div class="border-l border-gray-600 pl-6 flex flex-col space-y-4 w-full md:w-64">
     <p class="font-semibold text-gray-400">
      Quick feedback
     </p>
     <input type="text" class="rounded py-1">
     <textarea class=" border border-gray-600 rounded-md p-2  resize-none focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Your feedback here..." rows="4"></textarea>
     <button class="bg-blue-600 w-20 py-1 rounded  font-semibold flex items-center justify-center hover:bg-blue-700" type="button">
      <i class="fas fa-paper-plane mr-2">
      </i>
      Send
     </button>
    </div>
   </div>
  </footer>


</body>
</html>