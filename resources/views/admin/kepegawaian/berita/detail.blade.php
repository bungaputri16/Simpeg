@extends('layouts.theme')

@section('content')
    <div class="container">
        <!-- Card Blog -->
        <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto ">
            <!-- Title -->
            <div class="max-w-2xl   mb-10 lg:mb-14 flex flex-col">
                <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white ">{{ $berita->judul }}</h2>
                <div class="flex mt-1">
                <p class=" text-gray-600 dark:text-gray-400">Berita polindra.</p> <div class="mx-8"></div>
                <p class=" text-gray-600 dark:text-gray-400">{{ $berita->created_at->translatedFormat('l, d F Y') }}</p> 
                </div>
                <div class="relative  rounded-xl overflow-hidden h-[400px]">
                    @if ($berita->gambar)
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-xl" 
                    src="{{ asset('berita/'.$berita->gambar) }}" 
                    alt="{{ $berita->gambar }}"> 
                    @else
                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-xl" 
                    src="{{ asset('assets/icon/notfound_image.png') }}" 
                    alt="not found"> 
                    @endif
                  
                  </div>
            </div>
            <div>
                <p class=" text-gray-600 dark:text-gray-400">{{ $berita->isi }}</p>
            </div>

        </div>

    </div>
@endsection
