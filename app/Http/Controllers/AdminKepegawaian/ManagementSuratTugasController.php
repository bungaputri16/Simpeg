<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Models\LogHarian;
use App\Models\SuratTugas;
use App\Models\SuratTugasHasPenerima;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagementSuratTugasController extends Controller
{
    public function index(){
        $user = User::whereIn('role',['admin-pegawai','atasan-langsung','wadir','pegawai'])->get();
        // dd($user);
        $surattugas = SuratTugas::with('penerima.user')->paginate(8);
        // dd($surattugas);
        return view('admin.kepegawaian.management_kegiatan.surat_tugas', compact(['surattugas','user']));
    }
    public function store(Request $request) {
        // Validasi input data
        $attrs = $request->validate([
            'penerima_id' => 'required|exists:users,id',
            'nomor_sk' => 'required',
            'file' => 'required|file|max:2048', // Perubahan disini
        ]);
    
        // Cek apakah file diunggah
        if (!$request->hasFile('file')) {
            return redirect()->back()->with('error', 'Anda harus mengunggah sebuah file.');
        }
    
        // Simpan file yang diunggah
        $file = $request->file('file');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('document/surat_tugas/'), $filename);
    
        // Buat entitas SuratTugas
        $surattugas = SuratTugas::create([
            'nomor' => $attrs['nomor_sk'],
            'file_pendukung' => $filename, // Simpan nama file
        ]);
        SuratTugasHasPenerima::create([
            'user_id' => $attrs['penerima_id'],
            'surat_tugas_id' => $surattugas->id
        ]);
    
        // Redirect atau lakukan tindakan lainnya setelah penyimpanan berhasil
        return redirect()->route('management-surat-tugas.index')->with('success', 'Surat tugas berhasil disimpan.');
    }
    

}
