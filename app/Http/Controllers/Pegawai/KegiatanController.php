<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\LogHarian;
use App\Models\SuratKeputusan;
use App\Models\SuratTugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    public function surattugas()
    {
        $user = Auth::user();

        $surattugas = SuratTugas::with('penerima.user')
            ->whereHas('penerima', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->paginate(8);

        return view('pegawai.kegiatan.surat_tugas', compact('surattugas', 'user'));
    }

    public function suratkeputusan()
    {
        $user = Auth::user();

        $surattugas = SuratKeputusan::with('penerima.user')
            ->whereHas('penerima', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->paginate(8);

        return view('pegawai.kegiatan.surat_keputusan', compact('surattugas', 'user'));
    }
}
