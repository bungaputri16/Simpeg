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

                <form method="POST" action="{{ route('update-kedudukan') }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <!-- Section -->
                    <div
                        class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">


                        <div class="mt-2 space-y-3">
                            <label class="inline-block text-sm font-medium dark:text-white">
                                NIK
                            </label>
                            <input name="nik" type="number" value="{{ $kependudukan->nik }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="NIK">
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Agama
                            </label>
                            {{-- <input name="agama" type="text" value="{{ $kependudukan->agama }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Agama "> --}}
                                <select  name="agama" value="{{ $kependudukan->agama }}" class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                    <option disabled>Agama</option>
                                    <option value="islam"  >Islam</option>
                                    <option value="kristen">Kristen</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="buddha">Buddha</option>
                                    <option value="konghucu">Konghucu</option>
                                    <option value="lainya">Lainya</option>
                                  </select>
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Kewarganegaraan
                            </label>
                            {{-- <input name="kewarganegaraan" type="text" value="{{ $kependudukan->kewarganegaraan }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Kewarganegaraan"> --}}
                            <select  name="kewarganegaraan" value="{{ $kependudukan->kewarganegaraan }}" class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                    <option disabled>Select Warga Negara</option>
                                    <option value="wni"  >Warga Negara Indonesia</option>
                                    <option value="wna">Warga Negara Asing</option>
                                  </select>
                            <label class="inline-block text-sm font-medium dark:text-white">
                                File Pendukung
                            </label>

                            <div class=" space-y-3">
                                <label class="block">
                                    <span class="sr-only">Choose File Pendukung</span>
                                    <input name="file" type="file"
                                        class="block w-full text-sm text-gray-500
                                                file:mr-4 file:py-2 file:px-4
                                                file:rounded-md file:border-0
                                                file:text-sm file:font-semibold
                                                file:bg-blue-500 file:text-white
                                                hover:file:bg-blue-600" />
                                </label>

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
