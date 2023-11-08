@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="max-w-2xl px-4  sm:px-6 lg:px-8  mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Absensi Pegawai
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Politeknik Negeri Indramayu
                    </p>
                </div>

                <form method="POST" action="{{ route('managementpresensi.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="grid gap-y-4">
                        <!-- Form Group -->
                        <div>
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Pegawai
                            </label>
                            <select name="penerima_id" id="provinsiSelect"
                                class=" py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                style="width: 100%;">
                                <option selected disabled value="">Pilih Pegawai</option>
                                @foreach ($user as $pegawai)
                                    <option {{ $pegawaiAbsen->user_id == $pegawai->id ? 'selected' : ''}}  value="{{ $pegawai->id }}"> {{ $pegawai->name }} -
                                        {{ $pegawai->nip }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium dark:text-white">Jam Mulai</label>

                            <div class="flex">
                                <select
                                    class="w-[100px] py-2 px-3 pr-9 block border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    id="jam_mulai_jam">
                                    <option value="07" disabled selected>Jam</option>
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
                                    value="{{ $pegawaiAbsen->jam_masuk }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Jam Mulai" id="jam_mulai_input" readonly>
                            </div>

                            <label class="block text-sm font-medium dark:text-white">Jam Selesai</label>

                            <div class="flex">
                                <select
                                    class="w-[100px] py-2 px-3 pr-9 block border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    id="jam_selesai_jam">
                                    <option value="08" disabled selected>Jam</option>
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
                                value="{{ $pegawaiAbsen->jam_keluar }}"

                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Jam Selesai" id="jam_selesai_input" readonly>
                            </div>
                            <label for="tanggal_kehadiran" class="block text-sm mb-2 dark:text-white">
                                tanggal kehadiran</label>
                            <div class="relative">
                                <input value="{{ $pegawaiAbsen->tanggal_kehadiran }}" type="date" id="tanggal_kehadiran" name="tanggal_kehadiran"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                    required>
                                <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                    <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16" aria-hidden="true">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg>
                                </div>
                            </div>
                            <label for="status" class="block text-sm mb-2 dark:text-white">
                                Status Kehadiran Pegawai</label>
                            <div class="relative">
                                <select name="status" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                    <option value="" disabled selected>-- pilih status kehadiran pegawai --</option>
                                    <option {{ $pegawaiAbsen->status == 'hadir' ? 'selected' : ''}} value="hadir">hadir</option>
                                    <option {{ $pegawaiAbsen->status == 'cuti' ? 'selected' : ''}} value="cuti">cuti</option>
                                    <option {{ $pegawaiAbsen->status == 'dinas luar' ? 'selected' : ''}} value="dinas luar">dinas luar</option>
                                    <option {{ $pegawaiAbsen->status == 'lainya' ? 'selected' : ''}} value="lainya">lainya</option>
                                  </select>
                                <div class="hidden absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                    <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor"
                                        viewBox="0 0 16 16" aria-hidden="true">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg>
                                </div>
                            </div>

                            {{-- <p class="hidden text-xs text-red-600 mt-2" id="confirm-password-error">Password does not match the password</p> --}}
                        </div>
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
                        <!-- End Form Group -->


                        <button type="submit"
                            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">Kirim</button>
                    </div>
                </form>


            </div>
            <!-- End Card -->
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
        <script>
            $(document).ready(function() {
                var $provinsiSelect = $('#provinsiSelect');

                $provinsiSelect.select2();

            });
        </script>
        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ $errors->first() }}',
                });
            </script>
        @endif
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                });
            </script>
        @endif
    </div>
@endsection
