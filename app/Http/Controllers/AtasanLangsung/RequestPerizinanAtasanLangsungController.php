<?php

namespace App\Http\Controllers\AtasanLangsung;

use App\Http\Controllers\Controller;
use App\Models\JabatanStruktural;
use App\Models\PerizinanCuti;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class RequestPerizinanAtasanLangsungController extends Controller
{
    public function index(){
        // $pejabatBerwenangUnitKerja = Auth::user()->pegawaiStruktural->jabatanStruktural->unitkerja;
        // $pejabatBerwenangUnitKerja = Auth::user()->pegawaiStruktural->jabatanStruktural->unitkerjaatasanlangsung->atasanlangsung;
        $user = Auth::user();
        //!: buat cek atasan langsung ke unit kerja mana

        // dd($unitkerja);
        // Cari user-atasan-langsung dari unit mana
        $kepalaUnit = User::with(['pegawaiStruktural.jabatanStruktural.unitkerjaatasanlangsung'])
            ->where('role', 'atasan-langsung')
            ->first();
        //!: cari dulu unit_kerja where atasan langsung == user->atasan_langsung
    
        if(!$kepalaUnit) {
            return redirect()->route('some_redirect_route')->with('error', 'User atasan langsung tidak ditemukan');
        }
        // $unitkerja = $user->pegawaiStruktural->jabatanStruktural->unitkerjaatasanlangsung;
        
        //!: udah ketemu usernya jabatan ketua jurusan apa
        $unitkerja = $user->pegawaiStruktural->jabatanStruktural;
        // dd($unitkerja);
        // dd($unitkerja);
        $unit = UnitKerja::where('atasan_langsung_id', $unitkerja->id)->first();

        // dd($unit);

        // dd($unit);
        // $unitkerja = $kepalaUnit->pegawaiStruktural->jabatanStruktural->unitkerjaatasanlangsung;
        // dd($unitkerja);
        if (!$unitkerja) {
            return redirect()->route('dashboard')->with('error', 'Unit kerja tidak ditemukan');
        }
    
        $perizinan = PerizinanCuti::with('user')->where('unit_kerja_id', $unit->id)
            ->with('jeniscuti')
            ->orderBy('created_at', 'desc')
            ->paginate(8);
    
        return view('atasan_langsung.request_perizinan.index', compact(['perizinan','unitkerja']));
    }
    
    
    public function izinkan($id){
        $perizinan = PerizinanCuti::find($id);
        if(!$perizinan){
            return redirect()->route('request-perizinan-atasan-langsung.index');
        }
        $perizinan->pertimbangan_atasan_langsung = 'diizinkan';
        $perizinan->alasan_dari_atasan = '';
        $perizinan->update();
        return redirect()->route('request-perizinan-atasan-langsung.index');
    }
    

    public function formperubahan($id){
        // dd('hello world');
        $perizinan = PerizinanCuti::find($id);
        if(!$perizinan){
            dd('gada');
        }
        return view('atasan_langsung.request_perizinan.form_perubahan', compact('perizinan'));
    }
    public function perubahan(Request $request,$id){
        $attrs = $request->validate([
            'alasan' => 'required'
        ]);
        // dd('uwuw');
        //harusnya ada alasan nya
        $perizinan = PerizinanCuti::find($id);
        if(!$perizinan){
            return redirect()->route('request-perizinan-atasan-langsung.index');
        }
        $perizinan->pertimbangan_atasan_langsung = 'perubahan';
        $perizinan->alasan_dari_atasan = $attrs['alasan'];
        $perizinan->save();
        return redirect()->route('request-perizinan-atasan-langsung.index');
    }
    public function formditangguhkan($id){
        
        $perizinan = PerizinanCuti::find($id);
        if(!$perizinan){
            dd('gada');
        }
        return view('atasan_langsung.request_perizinan.form_ditangguhkan', compact('perizinan'));
    }
    public function ditangguhkan(Request $request,$id){
        $attrs = $request->validate([
            'alasan' => 'required'
        ]);
        $perizinan = PerizinanCuti::find($id);
        if(!$perizinan){
            return redirect()->route('request-perizinan-atasan-langsung.index');
        }

        // dd($request->all());
        

        
        $perizinan->pertimbangan_atasan_langsung = 'ditangguhkan';
        $perizinan->alasan_dari_atasan = $attrs['alasan'];
        $perizinan->save();
        return redirect()->route('request-perizinan-atasan-langsung.index');
    }
    public function formtidakdisetujui($id){
        
        $perizinan = PerizinanCuti::find($id);
        if(!$perizinan){
            dd('gada');
        }
        return view('atasan_langsung.request_perizinan.form_tidakdisetujui', compact('perizinan'));
    }
    public function tolak(Request $request,$id){
        $attrs = $request->validate([
            'alasan' => 'required'
        ]);
        //harusnya ada alasanya
        $perizinan = PerizinanCuti::find($id);
        if(!$perizinan){
            return redirect()->route('request-perizinan-atasan-langsung.index');
        }
        $perizinan->pertimbangan_atasan_langsung = 'tidak disetujui';
        $perizinan->alasan_dari_atasan = $attrs['alasan'];
        $perizinan->save();
        return redirect()->route('request-perizinan-atasan-langsung.index');
    }
}
