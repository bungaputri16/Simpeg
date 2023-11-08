<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Models\PegawaiFungsional;
use App\Models\UnitKerja;
use App\Models\UnitKerjaHasJabatanFungsional;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiFungsoinalController extends Controller
{
    public function index(){
        $pegawai = PegawaiFungsional::with(['user','unit_kerja_has_jabatan_fungsional.unitkerja'])->paginate(8);
        // dd($pegawai);
        return view('admin.kepegawaian.pegawai_fungsional.index', compact('pegawai'));
    }
    
    public function create(){
        $pegawai = User::whereDoesntHave('pegawaiFungsional')->paginate(8);
        $unitKerja = UnitKerja::with('jabatanfungsional')->get();
        $jabatanFungsional = UnitKerjaHasJabatanFungsional::all();
        
        // dd($unitKerja);

        // dd($pegawai);
        return view('admin.kepegawaian.pegawai_fungsional.create', compact(['pegawai','unitKerja','jabatanFungsional']));
    }
    public function created(Request $request, $id){
        $user = User::find($id);
        if(!$user){
            dd('gada user');
        }
        $attrs = $request->validate([
            'jabatan_id' => 'required'
        ]);
        $jabatanFungsional = UnitKerjaHasJabatanFungsional::find($attrs['jabatan_id']);
        if(!$jabatanFungsional){
            dd('gada jabatan');

        }
        PegawaiFungsional::create([
            'user_id' => $user->id,
            'unit_kerja_has_jabatan_fungsional_id' => $jabatanFungsional->id
        ]);
        return redirect()->route('pegawai-fungsional.index');

    }
    public function store(Request $request){
        // dd($request->all());
        $attrs = $request->validate([
            'name' => 'required|unique:jabatan_fungsionals',
        ]);
        PegawaiFungsional::create([
            'name' => $attrs['name'],
        ]);

        return redirect()->route('jabatan-fungsional.index');
    }
    public function edit($id){
        
        $jabatan = PegawaiFungsional::find($id);
        // dd($jabatan);
        // if(!$jabatan){
        //     return redirect()->route('pegawai-fungsional.index');
        // }

        return view('admin.kepegawaian.pegawai_fungsional.edit', compact('jabatan'));


    }

    public function update(Request $request,$id){
        $jabatan = PegawaiFungsional::find($id);
        // dd($pegawai);
        if(!$jabatan){
            dd('not found');
        }
        $attrs = $request->validate([
            'name' => 'required|unique:jabatan_fungsionals',
        ]);
        $jabatan->name = $attrs['name'];
        $jabatan->save();
        return redirect()->route('jabatan-fungsional.index');

    }

    public function destroy($id){
        $jabatan = PegawaiFungsional::find($id);
        if(!$jabatan){
            return redirect()->route('pegawai-fungsional.index');
        }
        $jabatan->delete();
        return redirect()->route('pegawai-fungsional.index');

    }
}
