@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="max-w-2xl px-4  sm:px-6 lg:px-8  mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Tanda Tangan
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Pegawai Politeknik Negeri Indramayu
                    </p>
                    {{-- <img width="100" height="100" src="images/tandatangan/{{ $tandaTangan->image }}" alt=""> --}}
                    <div class="flex justify-center my-2">
                        @if ($tandaTangan->image)
                            <div class="w-[100px] h-[100px]">

                                <img src="{{ asset('images/tandatangan/' . $tandaTangan->image) }}" alt="Tanda Tangan" />
                            </div>
                        @else
                            <p>Tidak ada tanda tangan</p>
                        @endif
                    </div>
                    @if ($tandaTangan->image)
                        <div class="flex justify-end ">
                            <form action="{{ route('delete-tandatangan') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border-2 border-red-200 font-semibold text-red-500 hover:text-white hover:bg-red-500 hover:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-200 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    Delete Tanda Tangan
                                </button>
                            </form>
                        </div>
                    @endif


                </div>

                <form method="POST" action="{{ route('update-tandatangan') }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <!-- Section -->
                    <div
                        class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tanda Tangan
                        </label>

                        <div class="mt-2 space-y-3">
                            <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input name="image" type="file"
                                    class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-500 file:text-white
                                    hover:file:bg-blue-600"
                                    accept="image/*" />
                            </label>
                        </div>
                    </div>

                    <div class="mt-5 flex justify-end gap-x-2">
                        <button type="reset"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover-bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover-text-white dark:focus:ring-offset-gray-800">
                            kembali
                        </button>
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
