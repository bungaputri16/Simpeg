@extends('layouts.theme')

@section('content')
    {{-- <p class="bg-red-200">hello</p> --}}
    <div class="container">

        <div class="flex w-full flex-col xl:flex-row">
            {{-- start left --}}
            <div class="w-full">
                <!-- Start Profile -->
                <div class="max-w-2xl  mx-auto ">
                    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900 m-2">
                        <div class="flex justify-between mb-2">
                            <h1 class="text-xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                                Profil
                            </h1>
                            <a href="{{ route('edit-profile') }}">
                                <img src="{{ asset('assets/icon/update.png') }}" alt="icon" width="30">
                            </a>
                        </div>
                        <div
                            class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex justify-center">
                            <div class="w-[100px]">
                                <img src="{{ asset('images/photo/' . $user->photo) }}" alt="img">
                            </div>

                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Nama</p>
                            <P>: {{ $user->name }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">NIP</p>
                            <P>: {{ $user->nip }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Email</p>
                            <P>: {{ $user->email }}</P>
                        </div>

                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Jenis Kelamin</p>
                            <P>:

                                @if ($user->jenis_kelamin == 'L')
                                    Laki-laki
                                @else
                                    Perempuan
                                @endif

                            </P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Tempat Lahir</p>
                            <P>: {{ $user->tempat_lahir }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Tanggal Lahir</p>
                            <P>: {{ $user->tanggal_lahir }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Nama Ibu Kandung</p>
                            <P>: {{ $user->nama_ibu }}</P>
                        </div>
                        {{-- <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">File Pendukung</p>
                            @if ($user->file_pendukung)
                                <a href="{{ url('document/file_pendukung/' . $user->file_pendukung) }}">Lihat
                                    file</a>
                            @else
                                : -
                            @endif
                        </div> --}}
                    </div>
                </div>
                <!-- End Profile -->
                <!-- Start Kependudukan -->
                <div class="max-w-2xl  mx-auto ">
                    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900 m-2">
                        <div class="flex justify-between mb-2">
                            <h1 class="text-xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                                Kependudukan
                            </h1>
                            <a href="{{ route('edit-kedudukan') }}">
                                <img src="{{ asset('assets/icon/update.png') }}" alt="icon" width="30">
                            </a>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">NIK</p>
                            <P>:{{ $kependudukan->nik }} </P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Agama</p>
                            <P>:{{ $kependudukan->agama }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Kewarganegaraan</p>
                            <P>:{{ $kependudukan->kewarganegaraan }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">File Pendukung</p>
                            @if ($kependudukan->file_pendukung)
                                <a href="{{ url('document/file_pendukung/' . $kependudukan->file_pendukung) }}">Lihat
                                    file</a>
                            @else
                                : -
                            @endif
                        </div>
                    </div>
                </div>
                <!-- End Kependudukan -->
                <!-- Start Keluarga -->
                <div class="max-w-2xl  mx-auto ">
                    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900 m-2">
                        <div class="flex justify-between mb-2">
                            <h1 class="text-xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                                Keluarga
                            </h1>
                            <a href="{{ route('edit-keluarga') }}">
                                <img src="{{ asset('assets/icon/update.png') }}" alt="icon" width="30">
                            </a>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Status Perkawinan</p>
                            <P>: {{ $keluarga->status_perkawinan }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Nama Suami/Istri</p>
                            <P>: {{ $keluarga->nama_pasangan }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Pekerjaan Suami/Istri</p>
                            <P>: {{ $keluarga->pekerjaan_pasangan }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">File Pendukung</p>
                            @if ($keluarga->file_pendukung)
                                <a href="{{ url('document/file_pendukung/' . $keluarga->file_pendukung) }}">Lihat
                                    file</a>
                            @else
                                : -
                            @endif
                        </div>
                    </div>
                </div>
                <!-- End Keluarga -->
            </div>
            {{-- end left --}}
            {{-- start right --}}
            <div class="w-full">
                <!-- Start Lain-lain -->
                <div class="max-w-2xl  mx-auto ">
                    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900 m-2">
                        <div class="flex justify-between mb-2">
                            <h1 class="text-xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                                Kepegawaian
                            </h1>
                            <a href="#">
                                <img src="{{ asset('assets/icon/update.png') }}" alt="icon" width="30">
                            </a>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Jabatan Fungisonal</p>
                            {{-- <P>:{{ $kepegawaian->jabatan_fungsional }}</P> --}}
                            
                            <P>: &nbsp; {{ $jabatanFungsionalPegawai }}</P>

                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Unit/jurusan</p>
                            {{-- <P>:{{ $kepegawaian->unit_jurusan }}</P> --}}
                            <P>: &nbsp; {{ $unitkerjaPegawai }}</P>

                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Jabatan Struktural</p>
                            {{-- <P>:{{ $kepegawaian->jabatan_struktural }}</P> --}}
                            <p>: &nbsp;{{ $jabatanStrukturalPegawai }}</p>
                        </div>
                    </div>
                </div>
                <!-- End Lain-lain -->
                <!-- Start Alamat dan Kontak -->
                <div class="max-w-2xl  mx-auto">
                    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900 m-2">
                        <div class="flex justify-between mb-2">
                            <h1 class="text-xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                                Alamat dan Kontak
                            </h1>
                            <a href="{{ route('edit-alamatkontak') }}">
                                <img src="{{ asset('assets/icon/update.png') }}" alt="icon" width="30">
                            </a>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Provinsi</p>
                            <P>: {{ $alamatdankontak->provinsi }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Kota / Kabupaten</p>
                            <P>: {{ $alamatdankontak->kota }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Kecematan </p>
                            <P>: {{ $alamatdankontak->kecamatan }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Desa/Kelurahan</p>
                            <P>: {{ $alamatdankontak->desa_kelurahan }}</P>
                        </div>

                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Alamat</p>
                            <P>: {{ $alamatdankontak->alamat }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">RT</p>
                            <P>: {{ $alamatdankontak->rt }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">RW</p>
                            <P>: {{ $alamatdankontak->rw }}</P>
                        </div>
                        
                        
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Kode Pos</p>
                            <P>: {{ $alamatdankontak->kodepos }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">No Telepon Rumah</p>
                            <P>: {{ $alamatdankontak->no_telp_rumah }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">No HP</p>
                            <P>: {{ $alamatdankontak->no_hp }}</P>
                        </div>
                    </div>
                </div>
                <!-- End Alamat dan Kontak -->

                <!-- Start Lain-lain -->
                <div class="max-w-2xl  mx-auto ">
                    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900 m-2">
                        <div class="flex justify-between mb-2">
                            <h1 class="text-xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                                Lain-lain
                            </h1>
                            <a href="{{ route('edit-lainlain') }}">
                                <img src="{{ asset('assets/icon/update.png') }}" alt="icon" width="30">
                            </a>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">NPWP</p>
                            <P>: {{ $lainlain->npwp }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">Nama Wajib Pajak</p>
                            <P>: {{ $lainlain->nama_wajib_pajak }}</P>
                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            <p class="max-w-[200px] w-full">File Pendukung</p>
                            @if ($lainlain->file_pendukung)
                                <a href="{{ url('document/file_pendukung/' . $lainlain->file_pendukung) }}">Lihat
                                    file</a>
                            @else
                                : -
                            @endif
                        </div>
                    </div>
                </div>
                <!-- End Lain-lain -->
                <!-- Start Lain-lain -->
                <div class="max-w-2xl  mx-auto ">
                    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900 m-2">
                        <div class="flex justify-between mb-2">
                            <h1 class="text-xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                                Tanda Tangan
                            </h1>
                            <div class="flex">

                                <a href="{{ route('edit-tandatangan') }}">
                                    <img src="{{ asset('assets/icon/update.png') }}" alt="icon" width="30">
                                </a>
                            </div>

                        </div>
                        <div class="py-2 border-t first:border-transparent border-gray-200 dark:border-gray-700 flex">
                            @if ($tandaTangan->image)
                                <div class="w-[100px] h-[100px] bg-red-400">
                                    <img src="{{ asset('images/tandatangan/' . $tandaTangan->image) }}"
                                        alt="Tanda Tangan" />
                                </div>
                            @else
                                <div class="flex justify-center  w-full my-8">
                                    <p>--- Tidak ada tanda tangan ---</p>
                                </div>
                            @endif


                        </div>

                    </div>
                </div>
                <!-- End Lain-lain -->

            </div>
            {{-- end right --}}


        </div>




    </div>
@endsection
