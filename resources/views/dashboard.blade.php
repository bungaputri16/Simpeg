@extends('layouts.theme')

@section('content')
    <div class="container">
        <!-- Card Blog -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Title -->
    <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
      <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">Berita</h2>
      <p class="mt-1 text-gray-600 dark:text-gray-400">Ikuti terus perkembangan yang ada di Sistem Kepegawaian</p>
      <p class="mt-1 text-gray-600 dark:text-gray-400">Politeknik Negeri Indramayu</p>
    </div>
    <!-- End Title -->
    {{-- <div x-data="{ slide: 0 }">
      <div class="relative">
        <div class="carousel">
          <div class="carousel-inner" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div x-show="slide === 0" class="carousel-slide">
              <img src="image1.jpg" alt="Slide 1">
            </div>
            <div x-show="slide === 1" class="carousel-slide">
              <img src="image2.jpg" alt="Slide 2">
            </div>
            <!-- Add more slides as needed -->
          </div>
        </div>
      </div>
      <div class="carousel-buttons">
        <button @click="slide = (slide - 1) % 3" class="carousel-button-left">Previous</button>
        <button @click="slide = (slide + 1) % 3" class="carousel-button-right">Next</button>
      </div>
    </div> --}}
    
  
    <!-- Grid -->
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach ($berita as $item)
          <!-- Card -->
      <a class="group rounded-xl overflow-hidden" href="{{ route('news.detail', ['id' => $item->id]) }}">
        <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
          @if ($item->gambar)
          <img class="w-full h-full absolute top-0 left-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-xl"
          src="{{ asset('berita/'.$item->gambar) }}" 
          alt="{{ $item->gambar }}"> 
          @else
          <img class="w-full h-full absolute top-0 left-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-xl"
          src="{{ asset('assets/icon/notfound_image.png') }}" 
          alt="not found"> 
          @endif
          
        </div>
  
        <div class="mt-7">
          <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-gray-200">
            {{ $item->judul }}
          </h3>
          <p class="mt-3 text-gray-800 dark:text-gray-200">
            {{$item->isi}}
          </p>
          <p class="mt-5 inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 group-hover:underline font-medium">
            Read more
            <svg class="w-2.5 h-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </p>
        </div>
      </a>
      <!-- End Card -->
      @endforeach
  
      <!-- Card -->
      {{-- <a class="group rounded-xl overflow-hidden" href="#">
        <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
          <img class="w-full h-full absolute top-0 left-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-xl" src="https://images.unsplash.com/photo-1542125387-c71274d94f0a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80" alt="Image Description">
        </div>
  
        <div class="mt-7">
          <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-gray-200">
            Onsite
          </h3>
          <p class="mt-3 text-gray-800 dark:text-gray-200">
            Optimize your in-person experience with best-in-class capabilities like badge printing and lead retrieval
          </p>
          <p class="mt-5 inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 group-hover:underline font-medium">
            Read more
            <svg class="w-2.5 h-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </p>
        </div>
      </a> --}}
      <!-- End Card -->
  
      <!-- Card -->
      {{-- <a class="group relative flex flex-col w-full min-h-[15rem] bg-center bg-cover rounded-xl hover:shadow-lg transition bg-[url('https://images.unsplash.com/photo-1634017839464-5c339ebe3cb4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3000&q=80')]" href="#">
        <div class="flex-auto p-4 md:p-6">
          <h3 class="text-xl text-white/[.9] group-hover:text-white"><span class="font-bold">Preline</span> Press publishes books about economic and technological advancement.</h3>
        </div>
        <div class="pt-0 p-4 md:p-6">
          <div class="inline-flex items-center gap-2 text-sm font-medium text-white group-hover:text-white/[.7]">
            Visit the site
            <svg class="w-2.5 h-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path d="M5.27921 2L10.9257 7.64645C11.1209 7.84171 11.1209 8.15829 10.9257 8.35355L5.27921 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </div>
        </div>
      </a> --}}
      <!-- End Card -->
    </div>
    <!-- End Grid -->
  </div>
  <!-- End Card Blog -->
    </div>
@endsection