@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="max-w-2xl px-4  sm:px-6 lg:px-8  mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Log Harian
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Politeknik Negeri Indramayu
                    </p>
                </div>

                <form method="POST" action="{{ route('logharian.update', $logedit->id) }}"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Section -->
                    <div
                        class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Nama Aktivitas
                        </label>
                        <div class="mt-2 space-y-3">
                            <input 
                                value="{{ $logedit->name }}"
                            name="nama_aktivitas" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nama Jabatan Struktural">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Deskripsi
                        </label>
                        <div class="mt-2 space-y-3">
                            <input name="deskripsi" type="text"
                            value="{{ $logedit->deskripsi }}"

                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nama Jabatan Struktural">
                        </div>
                        <label class="block text-sm font-medium dark:text-white">Jam Mulai</label>

                        <div class="flex">
                            <select
                                class="w-[100px] py-2 px-3 pr-9 block border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                id="jam_mulai_jam">
                                <option disabled selected>Jam</option>
                                @for ($i = 7; $i <= 16; $i++)
                                    <option value="{{ $i < 10 ? '0' . $i : $i }}">
                                        @if ($i < 10)
                                            0{{ $i }}
                                        @else
                                            {{ $i }}
                                        @endif
                                    </option>
                                @endfor
                            </select>

                            <select
                                class="w-[100px] py-2 px-3 pr-9 block border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                id="jam_mulai_menit">
                                <option value="00" disabled selected>Menit</option>
                                @for ($i = 0; $i <= 59; $i++)
                                    <option value="{{ $i < 10 ? '0' . $i : $i }}">
                                        @if ($i < 10)
                                            0{{ $i }}
                                        @else
                                            {{ $i }}
                                        @endif
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <div class="my-1 space-y-3">
                            <input name="jam_mulai" type="text"
                                value="{{ $logedit->waktu_mulai }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Jam Mulai" id="jam_mulai_input" readonly>
                        </div>
                    

                        <label class="block text-sm font-medium dark:text-white">Jam Selesai</label>

                        <div class="flex">
                            <select
                                class="w-[100px] py-2 px-3 pr-9 block border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                id="jam_selesai_jam">
                                <option disabled selected>Jam</option>
                                @for ($i = 7; $i <= 16; $i++)
                                    <option value="{{ $i < 10 ? '0' . $i : $i }}">
                                        @if ($i < 10)
                                            0{{ $i }}
                                        @else
                                            {{ $i }}
                                        @endif
                                    </option>
                                @endfor
                            </select>

                            <select
                                class="w-[100px] py-2 px-3 pr-9 block border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                id="jam_selesai_menit">
                                <option value="00" disabled selected>Menit</option>
                                @for ($i = 0; $i <= 59; $i++)
                                    <option value="{{ $i < 10 ? '0' . $i : $i }}">
                                        @if ($i < 10)
                                            0{{ $i }}
                                        @else
                                            {{ $i }}
                                        @endif
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <div class="my-1 space-y-3">
                            <input name="jam_selesai" type="text"
                                value="{{ $logedit->waktu_akhir }}"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Jam Selesai" id="jam_selesai_input" readonly>
                        </div>

                        <script>
                            const jamMulaiJamSelect = document.getElementById('jam_mulai_jam');
                            const jamMulaiMenitSelect = document.getElementById('jam_mulai_menit');
                            const jamMulaiInput = document.getElementById('jam_mulai_input');

                            const jamSelesaiJamSelect = document.getElementById('jam_selesai_jam');
                            const jamSelesaiMenitSelect = document.getElementById('jam_selesai_menit');
                            const jamSelesaiInput = document.getElementById('jam_selesai_input');

                            jamMulaiJamSelect.addEventListener('change', updateJamMulai);
                            jamMulaiMenitSelect.addEventListener('change', updateJamMulai);

                            jamSelesaiJamSelect.addEventListener('change', updateJamSelesai);
                            jamSelesaiMenitSelect.addEventListener('change', updateJamSelesai);

                            function updateJamMulai() {
                                const jam = jamMulaiJamSelect.value || '00';
                                const menit = jamMulaiMenitSelect.value || '00';
                                jamMulaiInput.value = `${jam}:${menit}`;
                            }

                            function updateJamSelesai() {
                                const jam = jamSelesaiJamSelect.value || '00';
                                const menit = jamSelesaiMenitSelect.value || '00';
                                jamSelesaiInput.value = `${jam}:${menit}`;
                            }
                        </script>
                        <label class="block text-sm font-medium dark:text-white">
                            File Pendukung
                        </label>
                        <div class="mt-2 space-y-3">
                            @if ($logedit->file_pendukung)
                                <label class="block text-sm text-gray-500">{{ $logedit->file_pendukung }}</label>
                            @endif
                            <label class="block">
                                <label class="block">
                                    <span class="sr-only">Choose profile photo</span>
                                    <input name="file" type="file"
                                        value="{{ $logedit->file_pendukung }}"
                                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-blue-600"/>
                                </label>
                            </label>
                        </div>
                        


                    </div>

                    <div class="mt-5 flex justify-end gap-x-2">
                        <button type="button"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover-bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover-text-white dark:focus:ring-offset-gray-800">
                            Kembali
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
