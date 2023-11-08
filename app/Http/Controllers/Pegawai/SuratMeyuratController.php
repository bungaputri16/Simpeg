<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\SuratMenyurat;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratMeyuratController extends Controller
{
    public function index()
    {
        $surat = SuratMenyurat::with(['pengirim', 'penerima', 'unitkerja'])
            ->where('penerima_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('pegawai.surat_menyurat.index', compact('surat'));
    }
    public function indexunit()
{
    $user = Auth::user();
    $unitKerjaId = null; // Inisialisasi sebagai null jika tidak ada unitkerja yang cocok.

    if ($user && $user->pegawaiFungsional) {
        $unitKerjaId = $user->pegawaiFungsional->unit_kerja_has_jabatan_fungsional->unit_kerja_id;
    }
    $surat = SuratMenyurat::with(['pengirim', 'penerima', 'unitkerja'])
            // ->where('penerima_id', Auth::user()->id)
            ->where('unit_kerja_id', $unitKerjaId)
            ->orderBy('created_at', 'desc')
            ->get();
    // dd($unitKerjaId);


    return view('pegawai.surat_menyurat.index', compact('surat'));
}


    public function create()
    {
        $unitkerja = UnitKerja::all();
        // dd($unitkerja);
        return view('pegawai.surat_menyurat.create', compact('unitkerja'));
    }

    public function searchuser(Request $request)
    {
        $input = $request->input('input');

        // Cari pengguna dalam database berdasarkan input
        $users = User::where('name', 'like', '%' . $input . '%')->get();

        return response()->json($users);
    }
    public function store(Request $request)
    {
        // validasi penerima untuk orang || untuk unit_kerja dulu
        // dd($request->all());

        $pengirimId = Auth::user()->id;
        $attrs = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        // if ($request->unit_kerja) {
        //     dd();
        // }

        if ($request->input('usersSelected')) {
            if ($request->file()) {
                $fileDocumentName = time() . '.' . $request->file->extension();
                $request->file->move(public_path('document/'), $fileDocumentName);
            }
            $usersArray = explode(',', $request->input('usersSelected'));
            foreach ($usersArray as $user) {
                SuratMenyurat::create([
                    'judul' => $attrs['judul'],
                    'isi' => $attrs['isi'],
                    'pengirim_id' => $pengirimId,
                    'penerima_id' => $user,
                    'file_pendukung' => $request->file() ? $fileDocumentName : null,
                ]);
            }
            return redirect()->route('surat.indexPengirim');
        }
        if ($request->input('unit_kerja_id')) {
            if ($request->file()) {
                $fileDocumentName = time() . '.' . $request->file->extension();
                $request->file->move(public_path('document/'), $fileDocumentName);
            }
            $usersArray = explode(',', $request->input('usersSelected'));
            foreach ($usersArray as $user) {
                SuratMenyurat::create([
                    'judul' => $attrs['judul'],
                    'isi' => $attrs['isi'],
                    'pengirim_id' => $pengirimId,
                    'unit_kerja_id' => $request->unit_kerja_id,
                    'file_pendukung' => $request->file() ? $fileDocumentName : null,
                ]);
            }
            return redirect()->route('surat.indexPengirim');
        }

        dd('Mau ngirim ke siapa coba');
    }
    public function download($name)
    {
        $pathToFile = public_path('document/' . $name);

        if (file_exists($pathToFile)) {
            return response()->download($pathToFile, $name);
        } else {
            abort(404, 'File not found');
        }
    }

    public function detail($id)
    {
        $user = Auth::user();
        $surat = SuratMenyurat::with(['penerima', 'pengirim'])->find($id);
        if (!$surat) {
            return redirect()->route('surat.index');
        }
        if ($surat->penerima_id == $user->id || $surat->pengirim_id == $user->id) {
            if ($surat->penerima_id == $user->id) {
                $surat->is_read = true;
                $surat->save();
            }
            return view('pegawai.surat_menyurat.detail', compact('surat'));
        } else {
            return redirect()->route('surat.index');
        }
    }

    public function indexPengirim()
    {
        $surat = SuratMenyurat::with(['pengirim', 'penerima', 'unitkerja'])
            ->where('pengirim_id', Auth::user()->id)
            ->get();
        // dd($surat);
        return view('pegawai.surat_menyurat.index_pengirim', compact('surat'));
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $surat = SuratMenyurat::where('id', $id)
            ->where('pengirim_id', $user->id)
            ->first();

        if (!$surat) {
            dd('gada');
        }

        // Check if an old image exists and delete it
        if ($surat->file_pendukung) {
            $oldfile_pendukung = public_path('document/' . $surat->file_pendukung);
            if (file_exists($oldfile_pendukung)) {
                unlink($oldfile_pendukung);
            }
        }

        $surat->delete();

        return redirect()->back();
    }
}
