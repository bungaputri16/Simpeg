<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Models\JabatanStruktural;
use App\Models\PegawaiHasStruktural;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiStrukturalController extends Controller
{
    public function index()
    {
        $pegawai = PegawaiHasStruktural::with(['users', 'jabatanStruktural'])->paginate(8);
        return view('admin.kepegawaian.pegawai_struktural.index', compact('pegawai'));
    }

    public function create()
    {
        $users = User::where('role', 'pegawai')
            ->orWhere('role', 'admin-pegawai')
            ->paginate(8);
        $jabatanStruktural = JabatanStruktural::all();
        return view('admin.kepegawaian.pegawai_struktural.create', compact('jabatanStruktural', 'users'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $attrs = $request->validate([
            'name' => 'required|unique:pegawai_strukturals',
        ]);
        PegawaiHasStruktural::create([
            'name' => $attrs['name'],
        ]);

        return redirect()->route('jabatan-fungsional.index');
    }
    public function edit($id)
    {
        $jabatan = PegawaiHasStruktural::find($id);
        // dd($jabatan);
        if (!$jabatan) {
            return redirect()->route('jabatan-fungsional.index');
        }

        return view('admin.kepegawaian.pegawai_struktural.edit', compact('jabatan'));
    }

    public function update(Request $request, $id)
    {
        $jabatan = PegawaiHasStruktural::find($id);
        // dd($pegawai);
        if (!$jabatan) {
            dd('not found');
        }
        $attrs = $request->validate([
            'name' => 'required|unique:pegawai_strukturals',
        ]);
        $jabatan->name = $attrs['name'];
        $jabatan->save();
        return redirect()->route('jabatan-fungsional.index');
    }

    public function storeJabatanStruktural(Request $request, $id)
    {
        // dd($request->all());
        //!: JABATAN STRUKTURALS HAS UNIT KERJA

        $user = User::find($id);
        if (!$user) {
            return redirect()->route('jabatan-fungsional.index');
        }
        $attrs = $request->validate([
            'id_jabatan_fungsional' => 'required',
        ]);
        $userRoleUpdate = JabatanStruktural::find($attrs['id_jabatan_fungsional']);
        if (!$userRoleUpdate) {
            return redirect()->route('jabatan-fungsional.index');
        }

        if ($userRoleUpdate->name == 'direktur') {
            $user->role = 'pegawai';
        } 
        else if ($userRoleUpdate->name == 'wadir 1' || $userRoleUpdate->name == 'wadir 2' || $userRoleUpdate->name == 'wadir 3') {
            $user->role = 'wadir';
        } else {
            $user->role = 'atasan-langsung';
        }
        $user->update();
        PegawaiHasStruktural::create([
            'users_id' => $user->id,
            'jabatan_struktural_id' => $attrs['id_jabatan_fungsional'],
        ]);

        return redirect()->route('pegawai-struktural.index');
    }
    public function destroy(Request $request, $id)
    {
        $pegawaiStruktural = PegawaiHasStruktural::with('users')->find($id);
        if (!$pegawaiStruktural) {
            return redirect()->route('pegawai-struktural.index');
        }
        $user = User::find($pegawaiStruktural->users_id);
        $user->role = 'pegawai';
        $user->update();
        $pegawaiStruktural->delete();
        return redirect()->route('pegawai-struktural.index');
    }
}
