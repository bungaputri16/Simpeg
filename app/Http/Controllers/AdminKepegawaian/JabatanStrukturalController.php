<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Models\JabatanStruktural;
use Illuminate\Http\Request;

class JabatanStrukturalController extends Controller
{
    public function index(){
        $jabatan = JabatanStruktural::paginate(8);
        return view('admin.kepegawaian.jabatan_struktural.index', compact('jabatan'));
    }
    
    public function create(){
        return view('admin.kepegawaian.jabatan_struktural.create');
    }
    public function store(Request $request) {
        $attrs = $request->validate([
            'name' => 'required|unique:jabatan_strukturals',
            'is_wewenang' => 'required|boolean'
        ]);
    
        $data = [
            'name' => $attrs['name'],
            'is_wewenang' => $attrs['is_wewenang'] ? 1 : 0,
        ];
    
        JabatanStruktural::create($data);
    
        return redirect()->route('jabatan-struktural.index');
    }
    
    public function edit($id){
        
        $jabatan = JabatanStruktural::find($id);
        // dd($jabatan);
        if(!$jabatan){
            return redirect()->route('jabatan-struktural.index');
        }

        return view('admin.kepegawaian.jabatan_struktural.edit', compact('jabatan'));


    }

    public function update(Request $request,$id){
        $jabatan = JabatanStruktural::find($id);
        // dd($pegawai);
        if(!$jabatan){
            dd('not found');
        }
        $attrs = $request->validate([
            'name' => 'required|unique:jabatan_strukturals',
        ]);
        $jabatan->name = $attrs['name'];
        $jabatan->save();
        return redirect()->route('jabatan-struktural.index');

    }

    public function destroy(Request $request, $id){
        $jabatan = JabatanStruktural::find($id);
        if(!$jabatan){
            return redirect()->route('jabatan-struktural.index');
        }
        // unit kerja has atasan langsung
        
        
        if($jabatan->atasanlangsung){
            $jabatan->atasanlangsung->delete();
        }
        if($jabatan->atasanberwenang){
            $jabatan->atasanberwenang->delete();
        }
        if($jabatan->pegawaiStruktural){
            $jabatan->pegawaiStruktural->delete();
        }
        $jabatan->delete();
        return redirect()->route('jabatan-struktural.index');

    }
}


















