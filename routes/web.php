<?php

use App\Http\Controllers\AdminKepegawaian\JabatanFungsionalController;
use App\Http\Controllers\AdminKepegawaian\JabatanStrukturalController;
use App\Http\Controllers\AdminKepegawaian\ManagementAbsensi;
use App\Http\Controllers\AdminKepegawaian\ManagementBeritaController;
use App\Http\Controllers\AdminKepegawaian\ManagementSuratKeputusanController;
use App\Http\Controllers\AdminKepegawaian\ManagementSuratTugasController;
use App\Http\Controllers\AdminKepegawaian\PegawaiFungsoinalController;
use App\Http\Controllers\AdminKepegawaian\PegawaiStrukturalController;
use App\Http\Controllers\AdminKepegawaian\UnitKerjaController;
use App\Http\Controllers\AdminKepegawaian\UnitKerjaHasJabatanFungsionalController;
use App\Http\Controllers\AdminSystem\AdminPegawaiController;
use App\Http\Controllers\AdminSystem\PegawaiController;
use App\Http\Controllers\AtasanLangsung\RequestPerizinanAtasanLangsungController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Pegawai\KegiatanController;
use App\Http\Controllers\Pegawai\LogHarianController;
use App\Http\Controllers\Pegawai\PendidikanFormalController;
use App\Http\Controllers\Pegawai\PerizinanController;
use App\Http\Controllers\Pegawai\ProfileController;
use App\Http\Controllers\pegawai\SertifikasiController as PegawaiSertifikasiController;
use App\Http\Controllers\Pegawai\SuratMeyuratController;
use App\Http\Controllers\SertifikasiController;
use App\Http\Controllers\Wadir\RequestPerizinanWadirController;
use App\Models\Berita;
// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //!: admin
    Route::middleware(['checkUserRole:admin'])->group(function () {
        Route::get('/admin/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
        Route::get('/admin/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
        Route::post('/admin/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
        Route::get('/admin/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
        Route::put('/admin/pegawai/{id}/update', [PegawaiController::class, 'update'])->name('pegawai.update');
        Route::delete('/admin/pegawai/{id}/delete', [PegawaiController::class, 'destroy'])->name('pegawai.delete');

        Route::put('/admin/pegawai/{id}/admin-pegawai', [PegawaiController::class, 'updateRolePegawaiAdmin'])->name('pegawai.updateRolePegawaiAdmin');
        Route::put('/admin/pegawai/{id}/pegawai', [AdminPegawaiController::class, 'updateRolePegawaiPegawai'])->name('pegawai.updateRolePegawaiPegawai');

        Route::get('/admin/admin-pegawai', [AdminPegawaiController::class, 'index'])->name('admin-pegawai.index');
        Route::get('/admin/admin-pegawai/{id}/edit', [AdminPegawaiController::class, 'edit'])->name('admin-pegawai.edit');
        Route::put('/admin/admin-pegawai/{id}/update', [AdminPegawaiController::class, 'update'])->name('admin-pegawai.update');
    });
    //!: admin

    //TODO: ADMIN PEGAWAI
    Route::middleware(['checkUserRole:admin-pegawai'])->group(function () {


        Route::get('/management-presensi', [ManagementAbsensi::class, 'index'])->name('managementpresensi');
        Route::post('/management-presensi', [ManagementAbsensi::class, 'store'])->name('managementpresensi.store');
        Route::get('/management-presensi/create', [ManagementAbsensi::class, 'create'])->name('managementpresensi.create');
        Route::delete('/management-presensi/{id}/delete', [ManagementAbsensi::class, 'destroy'])->name('managementpresensi.destroy');
        Route::get('/management-presensi/{id}/edit', [ManagementAbsensi::class, 'edit'])->name('managementpresensi.edit');

        // start berita
        Route::get('/news', [ManagementBeritaController::class, 'index'])->name('news.index');
        Route::get('/news/{id}/detail', [ManagementBeritaController::class, 'detail'])->name('news.detail');
        Route::get('/news/create', [ManagementBeritaController::class, 'create'])->name('news.create');
        Route::post('/news/store', [ManagementBeritaController::class, 'store'])->name('news.store');
        Route::get('/news/{id}/edit', [ManagementBeritaController::class, 'edit'])->name('news.edit');
        Route::put('/news/{id}/update', [ManagementBeritaController::class, 'update'])->name('news.update');
        Route::delete('/news/{id}/delete', [ManagementBeritaController::class, 'destroy'])->name('news.delete');

        // Route::get('/berita/create', [ManagementBeritaController::class, 'create'])->name('berita.create');
        // Route::post('/berita/store', [ManagementBeritaController::class, 'store'])->name('berita.store');
        // Route::get('/berita/{id}/edit', [ManagementBeritaController::class, 'edit'])->name('berita.edit');
        // Route::put('/berita/{id}/update', [ManagementBeritaController::class, 'update'])->name('berita.update');
        // Route::delete('/berita/{id}/delete', [ManagementBeritaController::class, 'destroy'])->name('berita.delete');
        // end berita

        Route::get('/jabatan-struktural', [JabatanStrukturalController::class, 'index'])->name('jabatan-struktural.index');
        Route::get('/jabatan-struktural/create', [JabatanStrukturalController::class, 'create'])->name('jabatan-struktural.create');

        Route::post('/jabatan-struktural/store', [JabatanStrukturalController::class, 'store'])->name('jabatan-struktural.store');
        Route::get('/jabatan-struktural/{id}/edit', [JabatanStrukturalController::class, 'edit'])->name('jabatan-struktural.edit');
        Route::put('/jabatan-struktural/{id}/update', [JabatanStrukturalController::class, 'update'])->name('jabatan-struktural.update');
        Route::delete('/jabatan-struktural/{id}/delete', [JabatanStrukturalController::class, 'destroy'])->name('jabatan-struktural.delete');

        // wil deleted
        Route::get('/jabatan-fungsional', [JabatanFungsionalController::class, 'index'])->name('jabatan-fungsional.index');
        Route::get('/jabatan-fungsional/create', [JabatanFungsionalController::class, 'create'])->name('jabatan-fungsional.create');
        Route::get('/jabatan-fungsional/{id}/create', [JabatanFungsionalController::class, 'created'])->name('jabatan-fungsional.created');
        Route::post('/jabatan-fungsional/store', [JabatanFungsionalController::class, 'store'])->name('jabatan-fungsional.store');
        Route::get('/jabatan-fungsional/{id}/edit', [JabatanFungsionalController::class, 'edit'])->name('jabatan-fungsional.edit');
        Route::put('/jabatan-fungsional/{id}/update', [JabatanFungsionalController::class, 'update'])->name('jabatan-fungsional.update');
        Route::delete('/jabatan-fungsional/{id}/delete', [JabatanFungsionalController::class, 'destroy'])->name('jabatan-fungsional.delete');
        // end will deleted

        Route::get('/pegawai-fungsional', [PegawaiFungsoinalController::class, 'index'])->name('pegawai-fungsional.index');
        Route::get('/pegawai-fungsional/create', [PegawaiFungsoinalController::class, 'create'])->name('pegawai-fungsional.create');
        Route::post('/pegawai-fungsional/{id}/created', [PegawaiFungsoinalController::class, 'created'])->name('pegawai-fungsional.created');

        Route::post('/pegawai-fungsional/store', [PegawaiFungsoinalController::class, 'store'])->name('pegawai-fungsional.store');
        Route::get('/pegawai-fungsional/{id}/edit', [PegawaiFungsoinalController::class, 'edit'])->name('pegawai-fungsional.edit');
        Route::put('/pegawai-fungsional/{id}/update', [PegawaiFungsoinalController::class, 'update'])->name('pegawai-fungsional.update');
        Route::delete('/pegawai-fungsional/{id}/delete', [PegawaiFungsoinalController::class, 'destroy'])->name('pegawai-fungsional.delete');

        Route::get('/pegawai-struktural', [PegawaiStrukturalController::class, 'index'])->name('pegawai-struktural.index');

        Route::get('/pegawai-struktural/create', [PegawaiStrukturalController::class, 'create'])->name('pegawai-struktural.create');

        Route::post('/pegawai-struktural/store', [PegawaiStrukturalController::class, 'store'])->name('pegawai-struktural.store');
        Route::get('/pegawai-struktural/{id}/edit', [PegawaiStrukturalController::class, 'edit'])->name('pegawai-struktural.edit');
        Route::put('/pegawai-struktural/{id}/update', [PegawaiStrukturalController::class, 'update'])->name('pegawai-struktural.update');

        Route::delete('/pegawai-struktural/{id}/delete', [PegawaiStrukturalController::class, 'destroy'])->name('pegawai-struktural.delete');
        Route::post('/pegawai-struktural/store/{id}/jabatan', [PegawaiStrukturalController::class, 'storeJabatanStruktural'])->name('pegawai-struktural.storeJabatan');

        Route::get('/unit-kerja', [UnitKerjaController::class, 'index'])->name('unit-kerja.index');
        Route::get('/unit-kerja/{id}/detail', [UnitKerjaController::class, 'detail'])->name('unit-kerja.detail');
        Route::get('/unit-kerja/create', [UnitKerjaController::class, 'create'])->name('unit-kerja.create');
        Route::post('/unit-kerja/store', [UnitKerjaController::class, 'store'])->name('unit-kerja.store');
        Route::get('/unit-kerja/{id}/edit', [UnitKerjaController::class, 'edit'])->name('unit-kerja.edit');
        Route::put('/unit-kerja/{id}/update', [UnitKerjaController::class, 'update'])->name('unit-kerja.update');
        Route::delete('/unit-kerja/{id}/delete', [UnitKerjaController::class, 'destroy'])->name('unit-kerja.delete');

        Route::get('/unit-kerja/{id}/create-jabatan-fungsional', [UnitKerjaHasJabatanFungsionalController::class, 'create'])->name('unit-kerja.createJabatanFungsional');
        Route::post('/unit-kerja/{id}/store-jabatan-fungsional', [UnitKerjaHasJabatanFungsionalController::class, 'store'])->name('unit-kerja.storeJabatanFungsional');

        Route::get('/unit-kerja/{id}/edit-jabatan-fungsional', [UnitKerjaHasJabatanFungsionalController::class, 'edit'])->name('unit-kerja.editJabatanFungsional');

        Route::put('/unit-kerja/{id}/update-jabatan-fungsional', [UnitKerjaHasJabatanFungsionalController::class, 'update'])->name('unit-kerja.updateJabatanFungsional');
        Route::delete('/unit-kerja/{id}/delete-jabatan-fungsional', [UnitKerjaHasJabatanFungsionalController::class, 'destroy'])->name('unit-kerja.deleteJabatanFungsional');

        Route::get('/management-surat-tugas', [ManagementSuratTugasController::class, 'index'])->name('management-surat-tugas.index');
        Route::post('/management-surat-tugas', [ManagementSuratTugasController::class, 'store'])->name('management-surat-tugas.store');

        Route::get('/management-surat-keputusan', [ManagementSuratKeputusanController::class, 'index'])->name('management-surat-keputusan.index');
        Route::post('/management-surat-keputusan', [ManagementSuratKeputusanController::class, 'store'])->name('management-surat-keputusan.store');

    });

    //todo
    Route::get('/export-pdf', [PerizinanController::class, 'exportPdf'])->name('perizinan-cuti.exportPdf');
    Route::get('/overview', [PerizinanController::class, 'overview'])->name('perizinan-cuti.overview');

    Route::get('/perizinan-cuti', [PerizinanController::class, 'index'])->name('perizinan-cuti.index');
    Route::get('/perizinan-cuti/create', [PerizinanController::class, 'create'])->name('perizinan-cuti.create');
    Route::post('/perizinan-cuti/store', [PerizinanController::class, 'store'])->name('perizinan-cuti.store');

    Route::get('/perizinan-cuti/{id}/edit', [PerizinanController::class, 'edit'])->name('perizinan-cuti.edit');
    Route::put('/perizinan-cuti/{id}/update', [PerizinanController::class, 'update'])->name('perizinan-cuti.update');
    Route::delete('/perizinan-cuti/{id}/delete', [PerizinanController::class, 'destroy'])->name('perizinan-cuti.delete');

    Route::get('/dinas-luar', [PerizinanController::class, 'index'])->name('dinas-luar.index');
    Route::get('/dinas-luar/create', [PerizinanController::class, 'create'])->name('dinas-luar.create');
    Route::post('/dinas-luar/store', [PerizinanController::class, 'store'])->name('dinas-luar.store');
    Route::get('/dinas-luar/{id}/edit', [PerizinanController::class, 'edit'])->name('dinas-luar.edit');
    Route::put('/dinas-luar/{id}/update', [PerizinanController::class, 'update'])->name('dinas-luar.update');
    Route::delete('/dinas-luar/{id}/delete', [PerizinanController::class, 'destroy'])->name('dinas-luar.delete');

    //todo: end todo

    //!: wadir
    Route::middleware(['checkUserRole:wadir'])->group(function () {
        Route::get('/request-perizinan-wadir', [RequestPerizinanWadirController::class, 'index'])->name('request-perizinan-wadir.index');
        Route::put('/request-perizinan-wadir/{id}/izinkan', [RequestPerizinanWadirController::class, 'izinkan'])->name('request-perizinan-wadir.izinkan');

        Route::get('/request-perizinan-wadir/{id}/ditangguhkan', [RequestPerizinanWadirController::class, 'formditangguhkan'])->name('request-perizinan-wadir.formditangguhkan');
        Route::put('/request-perizinan-wadir/{id}/ditangguhkan', [RequestPerizinanWadirController::class, 'ditangguhkan'])->name('request-perizinan-wadir.ditangguhkan');

        Route::get('/request-perizinan-wadir/{id}/perubahan', [RequestPerizinanWadirController::class, 'formperubahan'])->name('request-perizinan-wadir.formperubahan');
        Route::put('/request-perizinan-wadir/{id}/perubahan', [RequestPerizinanWadirController::class, 'perubahan'])->name('request-perizinan-wadir.perubahan');

        Route::get('/request-perizinan-wadir/{id}/tidakdisetujui', [RequestPerizinanWadirController::class, 'formtidakdisetujui'])->name('request-perizinan-wadir.formtidakdisetujui');

        Route::put('/request-perizinan-wadir/{id}/tolak', [RequestPerizinanWadirController::class, 'tolak'])->name('request-perizinan-wadir.tolak');
    });
    //!
    //!: wadir
    Route::middleware(['checkUserRole:atasan-langsung'])->group(function () {
        Route::get('/request-perizinan-atasan-langsung', [RequestPerizinanAtasanLangsungController::class, 'index'])->name('request-perizinan-atasan-langsung.index');
        Route::put('/request-perizinan-atasan-langsung/{id}/izinkan', [RequestPerizinanAtasanLangsungController::class, 'izinkan'])->name('request-perizinan-atasan-langsung.izinkan');

        Route::get('/request-perizinan-atasan-langsung/{id}/ditangguhkan', [RequestPerizinanAtasanLangsungController::class, 'formditangguhkan'])->name('request-perizinan-atasan-langsung.formditangguhkan');
        Route::put('/request-perizinan-atasan-langsung/{id}/ditangguhkan', [RequestPerizinanAtasanLangsungController::class, 'ditangguhkan'])->name('request-perizinan-atasan-langsung.ditangguhkan');

        Route::get('/request-perizinan-atasan-langsung/{id}/perubahan', [RequestPerizinanAtasanLangsungController::class, 'formperubahan'])->name('request-perizinan-atasan-langsung.formperubahan');
        Route::put('/request-perizinan-atasan-langsung/{id}/perubahan', [RequestPerizinanAtasanLangsungController::class, 'perubahan'])->name('request-perizinan-atasan-langsung.perubahan');

        Route::get('/request-perizinan-atasan-langsung/{id}/tidakdisetujui', [RequestPerizinanAtasanLangsungController::class, 'formtidakdisetujui'])->name('request-perizinan-atasan-langsung.formtidakdisetujui');
        Route::put('/request-perizinan-atasan-langsung/{id}/tolak', [RequestPerizinanAtasanLangsungController::class, 'tolak'])->name('request-perizinan-atasan-langsung.tolak');
    });
    //!

    Route::middleware(['checkUserRole:atasan-langsung,admin-pegawai,pegawai,wadir,direktur'])->group(function () {
        Route::get('/surat-tugas', [KegiatanController::class, 'surattugas'])->name('surattugas.index');
        Route::get('/surat-keputusan', [KegiatanController::class, 'suratkeputusan'])->name('suratkeputusan.index');

        Route::get('/pendidikan-formal', [PendidikanFormalController::class, 'index'])->name('pendidikanformal.index');
        Route::post('/pendidikan-formal', [PendidikanFormalController::class, 'store'])->name('pendidikanformal.store');


        Route::get('/sertifikasi', [PegawaiSertifikasiController::class, 'index'])->name('sertifikasi.index');
        Route::get('/sertifikasi-create', [PegawaiSertifikasiController::class, 'create'])->name('sertifikasi.create');
        Route::post('/sertifikasi', [PegawaiSertifikasiController::class, 'store'])->name('sertifikasi.store');




        Route::get('/profile/{name}/download-file-pendukung', [ProfileController::class, 'downloadFilePendukung'])->name('profile.downloadFilePendukung');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

        Route::get('/profile/edit-profil', [ProfileController::class, 'editProfile'])->name('edit-profile');

        Route::put('/profile/store-profil', [ProfileController::class, 'storeProfile'])->name('store-profile');

        Route::get('/profile/edit-kedudukan', [ProfileController::class, 'editKedudukan'])->name('edit-kedudukan');
        Route::put('/profile/update-kedudukan', [ProfileController::class, 'updateKedudukan'])->name('update-kedudukan');

        // Route::get('/profile/edit-kepegawaian', [ProfileController::class, 'editKepegawaian'])->name('edit-kepegawaian');
        // Route::put('/profile/update-kepegawaian', [ProfileController::class, 'updateKepegawaian'])->name('update-kepegawaian');

        Route::get('/profile/edit-keluarga', [ProfileController::class, 'editKeluarga'])->name('edit-keluarga');
        Route::put('/profile/update-keluarga', [ProfileController::class, 'updateKeluarga'])->name('update-keluarga');

        Route::get('/profile/edit-alamatkontak', [ProfileController::class, 'editAlamatkontak'])->name('edit-alamatkontak');
        Route::put('/profile/update-alamatkontak', [ProfileController::class, 'updateAlamatkontak'])->name('update-alamatkontak');

        Route::get('/profile/edit-lain_lain', [ProfileController::class, 'editLainlain'])->name('edit-lainlain');
        Route::put('/profile/update-lainlain', [ProfileController::class, 'updateLainlain'])->name('update-lainlain');

        Route::get('/profile/edit-tanda_tangan', [ProfileController::class, 'editTandaTangan'])->name('edit-tandatangan');
        Route::put('/profile/update-tanda_tangan', [ProfileController::class, 'updateTandaTangan'])->name('update-tandatangan');
        Route::delete('/profile/delete-tanda_tangan', [ProfileController::class, 'deleteTandaTangan'])->name('delete-tandatangan');

        Route::get('/surat', [SuratMeyuratController::class, 'index'])->name('surat.index');
        Route::get('/surat/unit-kerja', [SuratMeyuratController::class, 'indexunit'])->name('surat.indexunit');

        Route::get('/surat-keluar', [SuratMeyuratController::class, 'indexPengirim'])->name('surat.indexPengirim');
        Route::get('/surat/create', [SuratMeyuratController::class, 'create'])->name('surat.create');
        Route::post('/surat', [SuratMeyuratController::class, 'store'])->name('surat.store');
        Route::get('/surat/{id}/detail', [SuratMeyuratController::class, 'detail'])->name('surat.detail');
        Route::get('/surat/search-users', [SuratMeyuratController::class, 'searchuser'])->name('surat.searchuser');
        Route::get('/surat/{name}/download', [SuratMeyuratController::class, 'download'])->name('surat.download');
        Route::delete('/surat/{id}/delete', [SuratMeyuratController::class, 'destroy'])->name('surat.delete');

        //!: FITURE PRESENSI
        Route::get('/log-harian', [LogHarianController::class, 'index'])->name('logharian.index');

        Route::get('/log-harian/create', [LogHarianController::class, 'create'])->name('logharian.create');
        Route::post('/log-harian', [LogHarianController::class, 'store'])->name('logharian.store');
        Route::get('/log-harian/{id}/edit', [LogHarianController::class, 'edit'])->name('logharian.edit');
        Route::put('/log-harian/{id}/update', [LogHarianController::class, 'update'])->name('logharian.update');
        Route::delete('/log-harian/{id}/delete', [LogHarianController::class, 'destroy'])->name('logharian.destroy');
        
        Route::get('/riwayat-kehadiran', [RiwayatKehadiranController::class, 'index'])->name('riwayatkehadiran.index');

    
    });
});

require __DIR__ . '/auth.php';
