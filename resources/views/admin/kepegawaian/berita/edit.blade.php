@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="max-w-2xl px-4  sm:px-6 lg:px-8  mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Management Berita 
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Politeknik Negeri Indramayu
                    </p>
                </div>

                <form method="POST" action="{{ route('news.update', ['id' => $berita->id     ]) }}">
                    @csrf
                    @method('PUT')

                    <!-- Section -->
                    <div
                    class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">

                    
                    <label class="inline-block text-sm font-medium dark:text-white">
                        Judul
                    </label>
                    <div class="mt-2 space-y-3">
                        <input name="judul" type="text" value="{{ $berita->judul}}"
                            class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                            placeholder="Masukkan Judul Berita">
                    </div>


                    <label class="inline-block text-sm font-medium dark:text-white">
                        Isi
                    </label>
                    <div class="mt-2 space-y-3">
                        <input name="isi" type="text" value="{{ $berita->isi }}"
                            class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                            placeholder="Masukkan Isi Berita">
                    </div>


                    <label class="inline-block text-sm font-medium dark:text-white">
                        Foto
                    </label>
                    <div class="mt-2 space-y-3">
                        <label class="block">
                            <span class="sr-only">Pilih Profil Foto</span>
                            <input name="file" type="file" value="{{ $berita->gambar }}"
                                class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-500 file:text-white
                                hover:file:bg-blue-600
                            " />
                        </label>
                    </div>

                </div>

                    <div class="mt-5 flex justify-end gap-x-2">
                        <a href="{{ route ('news.index') }}">
                        <button type="button"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover-bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover-text-white dark:focus:ring-offset-gray-800">
                            Kembali
                        </button></a>

                        <button type="submit"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                            Simpan 
                        </button>
                    </div>

                </form>


            </div>
            <!-- End Card -->
        </div>
    </div>
@endsection
