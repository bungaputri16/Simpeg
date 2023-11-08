@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="max-w-4xl  px-4  sm:px-6 lg:px-8  mx-auto">
            <!-- Card -->
            <div class="bg-white w-full rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Perizinan Cuti
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Politeknik Negeri Indramayu
                    </p>
                </div>

                <form method="POST" action="{{ route('perizinan-cuti.store') }}">
                    @csrf

                    <!-- Section -->
                    <div
                        class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Jenis Cuti
                        </label>

                        <select name="jenis_cuti"
                            class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                            <option disabled selected>Pilih Jenis Cuti</option>
                            @foreach ($jeniscuti as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>


                        <label class="inline-block text-sm font-medium dark:text-white">
                            Alasan Cuti
                        </label>

                        <div class="my-1 space-y-3">
                            <input name="alasan" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nama Jabatan fungsional">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Alamat Selama Cuti
                        </label>

                        <div class="my-1 space-y-3">
                            <input name="alamat_selama_cuti" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nama Jabatan fungsional">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            No Telepon bisa dihubungi
                        </label>

                        <div class="my-1 space-y-3">
                            <input name="no_telp_bisa_dihubungi" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nama Jabatan fungsional">
                        </div>

                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tanggal Mulai
                        </label>
                        <div class="my-1 space-y-3">
                            <input name="tgl_mulai" type="date"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Tanggal Mulai" id="tgl_mulai">
                        </div>

                        <label class="inline-block text-sm font-medium dark:text-white">
                            Tanggal Selesai
                        </label>
                        <div class="my-1 space-y-3">
                            <input name="tgl_selesai" type="date"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Tanggal Selesai" id="tgl_selesai">
                        </div>

                        <script>
                            var inputTanggalMulai = document.getElementById("tgl_mulai");
                            var inputTanggalSelesai = document.getElementById("tgl_selesai");
                            var today = new Date().toISOString().split('T')[0];

                            // Mengatur tanggal minimal hari ini untuk kedua input tanggal
                            inputTanggalMulai.setAttribute("min", today);
                            inputTanggalSelesai.setAttribute("min", today);
                        </script>




                    </div>


                    <div class="mt-5 flex justify-end gap-x-2">
                        <button type="button"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover-bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover-text-white dark:focus:ring-offset-gray-800">
                            Cancel
                        </button>
                        <button type="submit"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                            Save changes
                        </button>
                    </div>

                </form>


            </div>
            <!-- End Card -->
        </div>
    </div>
@endsection
