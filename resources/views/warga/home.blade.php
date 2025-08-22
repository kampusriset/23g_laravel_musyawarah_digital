@extends('layouts.app')

@section('title','Dashboard Warga')

@section('content')
<div class="flex flex-col lg:flex-row items-center justify-between gap-10">
    <section class="max-w-xl text-left relative z-10">
        <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight text-[#d9dce6]">
            Sugeng Rawuh <br> Wonten SI MUDI
        </h1>
        <p class="mt-4 text-sm sm:text-base font-normal text-[#d9dce6] max-w-md leading-relaxed">
            Sak Klik, Rembug Rampung <br>
            Enggak perlu kumpul fisik, semua usulan dan pendapat bisa dilakukan secara real time dimanapun kamu berada!
        </p>
        <a href="{{ url('chat/1') }}" class="mt-8 bg-[#0561d1] hover:bg-[#0a72e6] transition-colors duration-300 rounded-md px-6 py-3 text-white text-base font-normal flex items-center gap-2">
            Ayo Diskusi <i class="fas fa-arrow-right"></i>
        </a>
    </section>
    <section class="max-w-3xl w-full">
        <img src="https://storage.googleapis.com/a1aa/image/2bc9c791-67eb-4916-214a-46d74f27eb5e.jpg" alt="Meeting illustration" class="w-full border-4 border-white">
    </section>
</div>
@endsection
