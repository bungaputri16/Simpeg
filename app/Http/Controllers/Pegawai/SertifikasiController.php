<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\Sertifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SertifikasiController extends Controller
{
    public function index(){

        $sertifikasi = Sertifikasi::where('user_id', Auth::user()->id)->get();

        return view('pegawai.kompetensi.sertifikasi',compact('sertifikasi'));
    }


    public function create(){
        $sertifikasi = Sertifikasi::all();
        // dd($sertifikasi);
        return view('pegawai.kompetensi.sertifikasi_create', compact('sertifikasi'));
    }

    public function store(Request $request)
    {
        //  dd($request);

        $attrs = $request->validate([
            'jenis_sertifikasi' => 'required',
            'bidang_studi' => 'required',
            'no_regis_pendidik'=> 'required',
            'no_sk' => 'required',
            'tahun_sertifikasi' => 'required',
        ]);

        Sertifikasi::create([
            'user_id' => Auth::user()->id,
            'jenis_sertifikasi' => $attrs['jenis_sertifikasi'],
            'bidang_studi' => $attrs['bidang_studi'],
            'no_regis_pendidik' => $attrs['no_regis_pendidik'],
            'no_sk' => $attrs['no_sk'],
            'tahun_sertifikasi' => $attrs['tahun_sertifikasi'],
        ]);

        return redirect()->route('sertifikasi.index');
    }


}
