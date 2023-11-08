<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Models\JabatanStruktural;
use App\Models\UnitKerja;
use App\Models\UnitKerjaHasAtasanLangsung;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    public function index(){
        $unitkerja = UnitKerja::with(['jabatanfungsional','atasanlangsung','jabatanberwenang'])->paginate(8);
        return view('admin.kepegawaian.unit_kerja.index', compact('unitkerja'));
    }
    public function detail($id){
        
        $unit = UnitKerja::with(['jabatanfungsional','atasanlangsung','jabatanberwenang'])->find($id);
        // dd($unit);
        if(!$unit){
            return redirect()->route('unit-kerja.index');
        }
        return view('admin.kepegawaian.unit_kerja.detail', compact('unit'));
    }
    
    public function create(){
        $jabatnStrukturalBerwenang = JabatanStruktural::where('is_wewenang',true)->get();
        // dd($jabatnStrukturalBerwenang);
        return view('admin.kepegawaian.unit_kerja.create', compact('jabatnStrukturalBerwenang'));
    }
    public function store(Request $request){
        // dd($request->all());

        // cek if tidak punya atasan langsung atau tidak

        $attrs = $request->validate([
            'name' => 'required|unique:unit_kerjas',
            'jabatan_struktural_berwenang' => 'exists:jabatan_strukturals,id',
            // 'jabatan_berwenang_id' => 'exists:jabatan_strukturals,id'
        ]);
        // dd($attrs['jabatan_struktural_berwenang']);
        // dd($attrs);

        

        if($request->has_atasan_langsung == '0'){
            // dd('0');
            UnitKerja::create([
                'name' => $attrs['name'],
                'jabatan_berwenang_id' => $attrs['jabatan_struktural_berwenang'],
                'atasan_langsung_id' => $attrs['jabatan_struktural_berwenang'],
            ]);
        }else{
            // dd("1");

            $atasanLangsung = JabatanStruktural::create([
                'name' => 'ketua '.$attrs['name']
            ]);
            UnitKerja::create([
                'name' => $attrs['name'],
                'jabatan_berwenang_id' => $attrs['jabatan_struktural_berwenang'],
                'atasan_langsung_id' => $atasanLangsung->id,
            ]);
            
        }
        

        return redirect()->route('unit-kerja.index');
    }
    public function edit($id){

        $jabatnStrukturalBerwenang = JabatanStruktural::where('is_wewenang',true)->get();
        $jabatan = UnitKerja::find($id);
        // dd($jabatan);
        if(!$jabatan){
            return redirect()->route('unit-kerja.index');
        }

        return view('admin.kepegawaian.unit_kerja.edit', compact(['jabatan','jabatnStrukturalBerwenang']));


    }

    public function update(Request $request,$id){
        $attrs = $request->validate([
            'name' => 'required',
            'jabatan_struktural_berwenang' => 'exists:jabatan_strukturals,id',
            // 'jabatan_berwenang_id' => 'exists:jabatan_strukturals,id'
        ]);
        // dd($request->all());
        $jabatan = UnitKerja::find($id);
        // dd($pegawai);
        if(!$jabatan){
            dd('not found');
        }
        // $attrs = $request->validate([
        //     'name' => 'required|unique:unit_kerjas',
        // ]);
        $jabatan->name = $attrs['name'];
        if($request->has_atasan_langsung == '0'){
            // dd('ada atasan langsung');

            $jabatanStrukturalAtasanLangsung = JabatanStruktural::find($jabatan->atasan_langsung_id);
            $jabatan->atasan_langsung_id = $jabatan->jabatan_berwenang_id;
            $jabatan->save();

            // $jabatanStrukturalAtasanLangsung->delete();
            if($jabatanStrukturalAtasanLangsung){
                $jabatanStrukturalAtasanLangsung->delete();
            }

        }else{
 
                $atasanLangsung = JabatanStruktural::create([
                    'name' => 'kepala '.$attrs['name']
                ]);

            $jabatan->atasan_langsung_id = $atasanLangsung->id;            
            $jabatan->save();
            
        }

        return redirect()->route('unit-kerja.index');

    }

    public function destroy(Request $request, $id){
        $jabatan = UnitKerja::find($id);
        if(!$jabatan){
            return redirect()->route('unit-kerja.index');
        }
        $jabatan->delete();
        return redirect()->route('unit-kerja.index');

    }
}
