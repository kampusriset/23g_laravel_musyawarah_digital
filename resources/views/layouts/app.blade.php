<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>Si MUDI - @yield('title','')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet"/>
  <style> body { font-family: "Inter", sans-serif; } </style>
 </head>
 <body class="bg-[#03162a] text-white">
  @include('layouts.nav')
  <main class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-16 py-8">
    @yield('content')
  </main>
  @include('layouts.footer')
 </body>
</html>
