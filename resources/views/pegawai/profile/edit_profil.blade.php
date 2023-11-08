@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="max-w-2xl px-4  sm:px-6 lg:px-8  mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Pegawai
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Politeknik Negeri Indramayu
                    </p>
                </div>
                @if ($errors->any())
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '{{ $errors->first() }}',
                    });
                </script>
            @endif
            



                <form method="POST" action="{{ route('store-profile') }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <!-- Section -->
                    <div
                        class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">

                        <div class="mt-2 space-y-3">
                            

                            <div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    Nama
                                </label>
                                <input name="name" type="text" value="{{ $user->name }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama Lengkap ">
                            </div>
                            <div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    NIP
                                </label>
                                <input name="nip" type="text" value="{{ $user->nip }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="NIP">
                            </div><div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    Email
                                </label>
                                <input name="email" type="email" value="{{ $user->email }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Email">
                            </div>


                            <div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    Jenis Kelamin
                                </label>
                                <select name="jk"
                                    value="{{ $user->jenis_kelamin }}"
                                    class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                    <option disabled>Jenis Kelamin</option>
                                    <option {{ $user->jenis_kelamin == 'l' ? 'selected' : '' }}  value="l">Laki-laki</option>
                                    <option {{ $user->jenis_kelamin == 'p' ? 'selected' : '' }} value="p">Perempuan</option>
                                </select>
                            </div>
                            <div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    Tempat Lahir
                                </label>
                                <input name="tempat_lahir" type="text" value="{{ $user->tempat_lahir }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Tempat Lahir">
                            </div>
                            <div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    Tanggal Lahir
                                </label>
                                <input value="{{ $user->tanggal_lahir }}" name="tanggal_lahir" type="date"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Tanggal Lahir">
                            </div>
                            <div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    Nama Ibu
                                </label>
                                <input name="nama_ibu" type="text" value="{{ $user->nama_ibu }}"
                                    class="px-3 pr-11 block w-full border-gray-200 shadow-sm 
                                    text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900
                                     dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama Ibu ">
                            </div>

                            <label class="inline-block text-sm font-medium dark:text-white">
                                Foto Profil
                            </label>

                            <div class=" space-y-3">
                                <label class="block">
                                    <span class="sr-only">Choose profile photo</span>
                                    <input name="file" type="file"
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
                    </div>

                    <div class="mt-5 flex justify-end gap-x-2">
                        <button type="button"
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
