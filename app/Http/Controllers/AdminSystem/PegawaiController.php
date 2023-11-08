<?php

namespace App\Http\Controllers\AdminSystem;

use App\Http\Controllers\Controller;
use App\Models\AlamatdanKontak;
use App\Models\Keluarga;
use App\Models\Kepegawaian;
use App\Models\Kependudukan;
use App\Models\Lainlain;
use App\Models\TandaTangan;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = User::whereIn('role', ['pegawai', 'atasan-langsung', 'wadir','direktur'])
    ->paginate(8);
        return view('admin.system.pegawai.index', compact('pegawai'));
    }

    public function create()
    {
        return view('admin.system.pegawai.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $attrs = $request->validate([
            'name' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::create([
            'name' => $attrs['name'],
            'nip' => $attrs['nip'],
            'email' => $attrs['email'],
            'password' => bcrypt($attrs['password']),
            'role' => 'pegawai',
        ]);

        Kependudukan::create([
            'user_id' => $user->id,
        ]);

        Keluarga::create([
            'user_id' => $user->id,
        ]);

        Kepegawaian::create([
            'user_id' => $user->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $user->id,
        ]);
        Lainlain::create([
            'user_id' => $user->id,
        ]);
        TandaTangan::create([
            'user_id' => $user->id,
        ]);
        

        return redirect()->route('pegawai.index');
    }
    public function edit(Request $request, $id)
    {
        // dd($request->all());
        $pegawai = User::find($id);
        // dd($pegawai);
        if (!$pegawai) {
            dd('not found');
        }

        return view('admin.system.pegawai.edit', compact('pegawai'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $pegawai = User::find($id);
        // dd($pegawai);
        if (!$pegawai) {
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
        if ($request->password) {
            $pegawai->password = $request->password;
        }
        $pegawai->save();
        return redirect()->route('pegawai.index');
    }
    public function destroy($id)
{
    $pegawai = User::find($id);

    if (!$pegawai) {
        return redirect()->route('pegawai.index')->with('error', 'Pegawai tidak ditemukan');
    }

    // Hapus relasi 'kependudukan'
    if ($pegawai->kependudukan) {
        $pegawai->kependudukan->delete();
    }

    // Hapus relasi 'keluarga'
    if ($pegawai->keluarga) {
        $pegawai->keluarga->delete();
    }

    // Hapus relasi 'kepegawaian'
    if ($pegawai->kepegawaian) {
        $pegawai->kepegawaian->delete();
    }

    // Hapus relasi 'alamatdankontak'
    if ($pegawai->alamatdankontak) {
        $pegawai->alamatdankontak->delete();
    }

    // Hapus relasi 'lainlain'
    if ($pegawai->lainlain) {
        $pegawai->lainlain->delete();
    }

    // Hapus relasi 'pegawaiStruktural' dan relasi-relasinya jika ada
    if ($pegawai->pegawaiStruktural) {
        // if ($pegawai->pegawaiStruktural->jabatanStruktural) {
        //     $pegawai->pegawaiStruktural->jabatanStruktural->delete();
        // }
        $pegawai->pegawaiStruktural->delete();
    }

    // Hapus pegawai
    $pegawai->delete();

    return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus');
}


    public function updateRolePegawaiAdmin(Request $request, $id)
    {
        // dd($request->all());
        $pegawai = User::find($id);
        // dd($pegawai);
        if (!$pegawai) {
            dd('not found');
        }
        $pegawai->role = 'admin-pegawai';
        $pegawai->save();
        return redirect()->route('pegawai.index');
    }
}
