<?php

namespace App\Http\Controllers\Wadir;

use App\Http\Controllers\Controller;
use App\Models\JabatanFungsional;
use App\Models\JenisCuti;
use App\Models\PegawaiFungsional;
use App\Models\PerizinanCuti;
use App\Models\UnitKerja;
use App\Models\UnitKerjaHasJabatanFungsional;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestPerizinanWadirController extends Controller
{
    public function index() {
        $pejabatBerwenangUnitKerja = Auth::user()->pegawaiStruktural->jabatanStruktural->unitkerja;
        
        // Periksa apakah objek pejabatBerwenangUnitKerja adalah null
        if (!$pejabatBerwenangUnitKerja) {
            return redirect()->route('wadir.request_perizinan.index')->with('error', 'User wadir langsung tidak ditemukan');
        }
    
        // Kumpulkan ID unit kerja yang dimiliki oleh pejabatBerwenangUnitKerja
        $unitKerjaIDs = $pejabatBerwenangUnitKerja->pluck('id');
    
        // Gunakan ID unit kerja untuk memfilter data perizinan
        // $perizinan = PerizinanCuti::whereIn('unit_kerja_id', $unitKerjaIDs)
        // ->where('keputusan_pejabat_berwenang', 'diizinkan')
        // ->with(['jeniscuti', 'user'])
        // ->orderBy('created_at', 'desc')
        // ->paginate(8);

        $perizinan = PerizinanCuti::whereIn('unit_kerja_id', $unitKerjaIDs)
        ->where('pertimbangan_atasan_langsung', 'diizinkan')
        ->with(['jeniscuti', 'user'])
        ->orderBy('created_at', 'desc')
        ->paginate(8);
        
            // dd($perizinan);
    
        // Lanjutkan dengan tampilan
        return view('wadir.request_perizinan.index', compact('perizinan'));
    }
    
    
    public function izinkan($id){
        $perizinan = PerizinanCuti::find($id);
        if(!$perizinan){
            return redirect()->route('request-perizinan-wadir.index');
        }
        $perizinan->keputusan_pejabat_berwenang = 'diizinkan';
        $perizinan->update();
        return redirect()->route('request-perizinan-wadir.index');
    }

    public function formperubahan($id){
        // dd('hello world');
        $perizinan = PerizinanCuti::find($id);
        if(!$perizinan){
            dd('gada');
        }
        return view('wadir.request_perizinan.form_perubahan', compact('perizinan'));
    }
    public function perubahan(Request $request,$id){
        $attrs = $request->validate([
            'alasan' => 'required'
        ]);
        // dd('uwuw');
        //harusnya ada alasan nya
        $perizinan = PerizinanCuti::find($id);
        if(!$perizinan){
            return redirect()->route('request-perizinan-wadir.index');
        }
        $perizinan->keputusan_pejabat_berwenang = 'perubahan';
        $perizinan->alasan_dari_atasan = $attrs['alasan'];
        $perizinan->save();
        return redirect()->route('request-perizinan-wadir.index');
    }
    public function formditangguhkan($id){
        
        $perizinan = PerizinanCuti::find($id);
        if(!$perizinan){
            dd('gada');
        }
        return view('wadir.request_perizinan.form_ditangguhkan', compact('perizinan'));
    }
    public function ditangguhkan(Request $request,$id){
        $attrs = $request->validate([
            'alasan' => 'required'
        ]);
        $perizinan = PerizinanCuti::find($id);
        if(!$perizinan){
            return redirect()->route('request-perizinan-wadir.index');
        }

        // dd($request->all());
        

        
        $perizinan->keputusan_pejabat_berwenang = 'ditangguhkan';
        $perizinan->alasan_dari_atasan = $attrs['alasan'];
        $perizinan->save();
        return redirect()->route('request-perizinan-wadir.index');
    }
    public function formtidakdisetujui($id){
        
        $perizinan = PerizinanCuti::find($id);
        if(!$perizinan){
            dd('gada');
        }
        return view('wadir.request_perizinan.form_tidakdisetujui', compact('perizinan'));
    }
    public function tolak(Request $request,$id){
        $attrs = $request->validate([
            'alasan' => 'required'
        ]);
        $perizinan = PerizinanCuti::find($id);
        if(!$perizinan){
            return redirect()->route('request-perizinan-wadir.index');
        }
        $perizinan->keputusan_pejabat_berwenang = 'ditolak';
        $perizinan->alasan_dari_atasan = $attrs['alasan'];
        $perizinan->update();
        return redirect()->route('request-perizinan-wadir.index');
    }
}
