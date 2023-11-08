@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="max-w-2xl px-4  sm:px-6 lg:px-8  mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Alamat dan Kontak
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Pegawai Politeknik Negeri Indramayu
                    </p>
                </div>

                <form method="POST" action="{{ route('update-alamatkontak') }}">
                    @csrf
                    @method('put')

                    <!-- Section -->
                    <div
                        class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">
                        {{-- <label class="inline-block text-sm font-medium dark:text-white">
                            Alamat dan Kontak 
                        </label> --}}

                        <div class="mt-2 space-y-3">


                            <div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    Provinsi
                                </label>
                                <input type="hidden" name="nama_provinsi" id="nama_provinsi">
                                <select name="provinsi" id="provinsiSelect" class="js-example-basic-single"
                                    style="width: 100%;">
                                    <option value="">Pilih Provinsi</option>
                                </select>
                            </div>
                            <div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    Kota
                                </label>
                                <input type="hidden" name="nama_kabupaten" id="nama_kabupaten">

                                <select id="kotaSelect" class="js-example-basic-single" style="width: 100%;">
                                    <option value="">Pilih Kota/Kabupaten</option>
                                </select>
                            </div>
                            <div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    Kecamatan
                                </label>
                                <input type="hidden" name="nama_kecamatan" id="nama_kecamatan">

                                <select id="kecamatanSelect" class="js-example-basic-single" style="width: 100%;">
                                    <option value="">Pilih Kecamatan</option>
                                </select>



                            </div>
                            <div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    Desa
                                </label>
                                <input type="hidden" name="nama_desa" id="nama_desa">
                                <select id="desaSelect" class="js-example-basic-single" style="width: 100%;">
                                    <option value="">Pilih Desa</option>
                                </select>


                            </div>
                            <div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    RT
                                </label>
                                <input name="rt" type="numeric" value="{{ $alamatdankontak->rt }}" pattern="\d{1,2}"
                                    inputmode="numeric" maxlength="2"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Rt">
                            </div>
                            <div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    Rw
                                </label>
                                <input name="rw" type="numeric" value="{{ $alamatdankontak->rw }}" pattern="\d{1,2}"
                                    inputmode="numeric" maxlength="2"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Rw">
                            </div>

                            <div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    Kode Pos
                                </label>
                                <input name="kodepos" type="number" value="{{ $alamatdankontak->kodepos }}"
                                    inputmode="numeric" maxlength="7" min="10000" max="999999"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Kode Pos">
                            </div>
                            
                            <div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    Alamat Detail
                                </label>
                                <input name="alamat" type="text" value="{{ $alamatdankontak->alamat }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Jalan/ Block / No. Rumah / Patokan">
                            </div>
                            <div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    No Telephone Rumah
                                </label>
                                <input name="no_telp_rumah" type="text" value="{{ $alamatdankontak->no_telp_rumah }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="No Telepon Rumah">
                            </div>
                            <div>
                                <label class="inline-block text-sm font-medium dark:text-white">
                                    No Hp
                                </label>
                                <input name="no_hp" type="text" value="{{ $alamatdankontak->no_hp }}"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="No HP ">
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
        <script>
            $(document).ready(function() {
                var $provinsiSelect = $('#provinsiSelect');
                var $kotaSelect = $('#kotaSelect');
                var $kecamatanSelect = $('#kecamatanSelect');
                var $desaSelect = $('#desaSelect');
                var $nama_provinsi = $('#nama_provinsi');
                var $nama_kabupaten = $('#nama_kabupaten');
                var $nama_kecamatan = $('#nama_kecamatan');
                var $nama_desa = $('#nama_desa');

                // Inisialisasi Select2 untuk dropdown provinsi dan kota
                $provinsiSelect.select2();
                $kotaSelect.select2();
                $kecamatanSelect.select2();
                $desaSelect.select2();

                // Ambil data provinsi dari API
                $.ajax({
                    url: 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json',
                    type: 'GET',
                    dataType: 'json',
                    success: function(provinsiData) {
                        // Isi dropdown provinsi dengan data provinsi
                        $.each(provinsiData, function(index, provinsi) {
                            var selected = (provinsi.name === '{{ $alamatdankontak->provinsi }}') ?
                                'selected' : '';
                            $provinsiSelect.append('<option value="' + provinsi.id + '"' +
                                selected + '>' + provinsi.name + '</option>');
                        });

                        $provinsiSelect.select2(); // Activate Select2

                        // Trigger the "change" event on $provinsiSelect to notify any attached event listeners
                        $provinsiSelect.trigger('change');
                    },
                    error: function() {
                        console.error('Gagal mengambil data provinsi dari API.');
                    }
                });
                // Tambahkan event listener untuk perubahan dropdown provinsi
                $provinsiSelect.on('change', function() {
                    var selectedProvinsiId = $provinsiSelect.val();
                    var selectedProvinsiText = $provinsiSelect.find('option:selected').text();

                    $('#nama_provinsi').val(selectedProvinsiText);



                    if (selectedProvinsiId) {
                        //                     var selectedProvinsiText = $provinsiSelect.find('option:selected').text();

                        // // Mengisi input tersembunyi "nama_provinsi" dengan teks yang dipilih
                        // $('#nama_provinsi').val(selectedProvinsiText);
                        //                     // Mengambil data kota berdasarkan provinsi yang dipilih
                        $.ajax({
                            url: 'https://www.emsifa.com/api-wilayah-indonesia/api/regencies/' +
                                selectedProvinsiId + '.json',
                            type: 'GET',
                            dataType: 'json',
                            success: function(kotaData) {
                                // Kosongkan dropdown kota
                                $kotaSelect.empty();

                                // Isi dropdown kota dengan data yang diambil
                                $.each(kotaData, function(index, kota) {
                                    
                                    var selected = (kota.name === '{{ $alamatdankontak->kota }}') ?
                                'selected' : '';
                                    $kotaSelect.append('<option value="' + kota.id + '" ' + selected + '>' +
                                        kota.name + '</option>');


                                });
                                $kotaSelect.select2(); // Activate Select2

                        // Trigger the "change" event on $provinsiSelect to notify any attached event listeners
                        $kotaSelect.trigger('change');
                            },
                            error: function() {
                                console.error('Gagal mengambil data kota dari API.');
                            }
                        });
                    }

                });
                $kotaSelect.on('change', function() {
                    var selectedKotaId = $kotaSelect.val();
                    var selectedKotaText = $kotaSelect.find('option:selected').text();
                    $('#nama_kabupaten').val(selectedKotaText);
                    // console.log('agar' + selectedKotaText)

                    if (selectedKotaId) {
                        // Mengambil data kecamatan berdasarkan kabupaten/kota yang dipilih
                        $.ajax({
                            url: 'https://www.emsifa.com/api-wilayah-indonesia/api/districts/' +
                                selectedKotaId + '.json',
                            type: 'GET',
                            dataType: 'json',
                            success: function(kecamatanData) {
                                // Kosongkan dropdown kecamatan
                                $kecamatanSelect.empty();
                                $kecamatanSelect.append(
                                    '<option value="">Pilih Kecamatan</option>');

                                // Isi dropdown kecamatan dengan data yang diambil
                                
                                $.each(kecamatanData, function(index, kecamatan) {
                                    var selected = (kecamatan.name === '{{ $alamatdankontak->kecamatan }}') ?
                                'selected' : '';
                                    $kecamatanSelect.append('<option value="' + kecamatan
                                        .id + '" ' + selected +'>' +
                                        kecamatan.name + '</option>');
                                });

                                // Aktifkan kembali Select2 untuk dropdown kecamatan
                                $kecamatanSelect.select2(); // Activate Select2

                                $kecamatanSelect.trigger('change');
                            },
                            error: function() {
                                console.error('Gagal mengambil data kecamatan dari API.');
                            }
                        });
                    }
                });

                $kecamatanSelect.on('change', function() {
                    var selectedKecamatanId = $kecamatanSelect.val();
                    var kecamatanSelectKotaText = $kecamatanSelect.find('option:selected').text();
                    $('#nama_kecamatan').val(kecamatanSelectKotaText);
                    if (selectedKecamatanId) {
                        // Mengambil data desa berdasarkan kecamatan yang dipilih
                        $.ajax({
                            url: 'https://www.emsifa.com/api-wilayah-indonesia/api/villages/' +
                                selectedKecamatanId + '.json',
                            type: 'GET',
                            dataType: 'json',
                            success: function(desaData) {
                                $desaSelect.empty();
                                $desaSelect.append('<option value="">Pilih Desa</option>');

                                $.each(desaData, function(index, desa) {
                                    var selected = (desa.name === '{{ $alamatdankontak->desa_kelurahan }}') ?
                                'selected' : '';
                                    $desaSelect.append('<option value="' + desa.id + '" '+ selected +' >' +
                                        desa.name + '</option>');
                                });

                                $desaSelect.select2(); // Activate Select2

                                $desaSelect.trigger('change');
                            },
                            error: function() {
                                console.error('Gagal mengambil data desa dari API.');
                            }
                        });
                    }
                });

                $desaSelect.on('change', function(){
                    console.log('agat');
                    var selecteddesanId = $desaSelect.val();
                    var desaSelectKotaText = $desaSelect.find('option:selected').text();
                    $('#nama_desa').val(desaSelectKotaText);
                });


            });
        </script>


    </div>
@endsection
