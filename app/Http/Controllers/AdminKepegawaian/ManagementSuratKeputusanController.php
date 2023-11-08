<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Models\SuratKeputusan;
use App\Models\SuratKeputusanHasPenerima;
use App\Models\User;
use Illuminate\Http\Request;

class ManagementSuratKeputusanController extends Controller
{
    public function index(){
        $user = User::whereIn('role',['admin-pegawai','atasan-langsung','wadir','pegawai'])->get();
        // dd($user);
        $surattugas = SuratKeputusan::with('penerima.user')->paginate(8);
        // dd($surattugas);
        return view('admin.kepegawaian.management_kegiatan.surat_keputusan', compact(['surattugas','user']));
    }
    public function store(Request $request) {
        // dd('hello world');
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
        $file->move(public_path('document/surat_keputusan/'), $filename);
    
        // Buat entitas SuratTugas
        $surattugas = SuratKeputusan::create([
            'nomor' => $attrs['nomor_sk'],
            'file_pendukung' => $filename, // Simpan nama file
        ]);
        SuratKeputusanHasPenerima::create([
            'user_id' => $attrs['penerima_id'],
            'surat_keputusan_id' => $surattugas->id
        ]);
    
        // Redirect atau lakukan tindakan lainnya setelah penyimpanan berhasil
        return redirect()->route('management-surat-keputusan.index')->with('success', 'Surat tugas berhasil disimpan.');
    }
}
