<?php

namespace App\Http\Controllers\AdminSystem;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPegawaiController extends Controller
{
    public function index(){
        $pegawai = User::where('role', 'admin-pegawai')->paginate(8);
        return view('admin.system.admin_kepegawaian.index', compact('pegawai'));
    }
    public function updateRolePegawaiPegawai(Request $request,$id){
        // dd($request->all());
        $pegawai = User::find($id);
        // dd($pegawai);
        if(!$pegawai){
            dd('not found');
        }
        $pegawai->role = 'pegawai';
        $pegawai->save();
        return redirect()->route('admin-pegawai.index');
    }

    public function edit(Request $request,$id){
        // dd($request->all());
        $pegawai = User::find($id);
        // dd($pegawai);
        if(!$pegawai){
            dd('not found');
        }

        return view('admin.system.admin_kepegawaian.edit', compact('pegawai'));

    }

    public function update(Request $request,$id){
        // dd($request->all());
        $pegawai = User::find($id);
        // dd($pegawai);
        if(!$pegawai){
            dd('not found');
        }
        $attrs = $request->validate([
            'name' => 'required',
            'nip' => 'required',
            'email' => 'required',
        ]);
        $pegawai->name = $attrs['name'];
        $pegawai->email = $attrs['email'];
        $pegawai->nip = $attrs['nip'];
        if($request->password){
            $pegawai->password = $request->password;
        }
        $pegawai->save();
        return redirect()->route('admin-pegawai.index');

    }
    
}
