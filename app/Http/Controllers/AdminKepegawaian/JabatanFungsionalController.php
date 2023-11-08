<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Models\JabatanFungsional;
use Illuminate\Http\Request;

class JabatanFungsionalController extends Controller
{
    public function index(){
        $jabatan = JabatanFungsional::paginate(8);
        return view('admin.kepegawaian.jabatan_fungsional.index', compact('jabatan'));
    }
    
    public function create(){
        return view('admin.kepegawaian.jabatan_fungsional.create');
    }
    
    public function store(Request $request){
        // dd($request->all());
        $attrs = $request->validate([
            'name' => 'required|unique:jabatan_fungsionals',
        ]);
        JabatanFungsional::create([
            'name' => $attrs['name'],
        ]);

        return redirect()->route('jabatan-fungsional.index');
    }
    public function edit($id){
        
        $jabatan = JabatanFungsional::find($id);
        // dd($jabatan);
        if(!$jabatan){
            return redirect()->route('jabatan-fungsional.index');
        }

        return view('admin.kepegawaian.jabatan_fungsional.edit', compact('jabatan'));


    }

    public function update(Request $request,$id){
        $jabatan = JabatanFungsional::find($id);
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

    public function destroy(Request $request, $id){
        $jabatan = JabatanFungsional::find($id);
        if(!$jabatan){
            return redirect()->route('jabatan-fungsional.index');
        }
        $jabatan->delete();
        return redirect()->route('jabatan-fungsional.index');

    }
}
