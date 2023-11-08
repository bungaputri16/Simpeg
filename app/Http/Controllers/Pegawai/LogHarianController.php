<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\LogHarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogHarianController extends Controller
{
    public function index()
    {
        $log_harian = LogHarian::where('user_id', Auth::user()->id)->get();
        // dd($log_harian);
        return view('pegawai.presensi.log_harian.index', compact('log_harian'));
    }

    public function create()
    {
        return view('pegawai.presensi.log_harian.create');
    }


    public function store(Request $request)
    {
        // dd($request->file());

        $attrs = $request->validate([
            'nama_aktivitas' => 'required',
            'deskripsi' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $fileDocumentName = null; // Inisialisasi nama file menjadi null

        if ($request->hasFile('file')) {
            $fileDocumentName = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('logharian/'), $fileDocumentName);
        }

        LogHarian::create([
            'user_id' => Auth::user()->id,
            'name' => $attrs['nama_aktivitas'],
            'deskripsi' => $attrs['deskripsi'],
            'waktu_mulai' => $attrs['jam_mulai'],
            'waktu_akhir' => $attrs['jam_selesai'],
            'file_pendukung' => $fileDocumentName, // Menggunakan $fileDocumentName yang sudah diinisialisasi
        ]);

        return redirect()->route('logharian.index');
    }

    public function edit($id)
    {
        // $logedit = LogHarian::find($id);
        $logedit = LogHarian::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();
        if (!$logedit) {
            return redirect()->route('logharian.index');
        }
        return view('pegawai.presensi.log_harian.edit', compact('logedit'));
    }

    
    public function update(Request $request, $id)
    {
        // dd($request->all());
        // $log = LogHarian::find($id);
        $log = LogHarian::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();
        if (!$log) {
            return redirect()->route('logharian.index');
        }
        $attrs = $request->validate([
            'nama_aktivitas' => 'required',
            'deskripsi' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);
        $log->name = $attrs['nama_aktivitas'];
        $log->deskripsi = $attrs['deskripsi'];
        $log->waktu_mulai = $attrs['jam_mulai'];
        $log->waktu_akhir = $attrs['jam_selesai'];
        if ($request->file()) {
            $oldfile_pendukung = public_path('logharian/' . $log->file_pendukung);
            if (file_exists($oldfile_pendukung)) {
                unlink($oldfile_pendukung);
            }
            $fileDocumentName = null;

            if ($request->hasFile('file')) {
                $fileDocumentName = time() . '.' . $request->file('file')->extension();
                $request->file('file')->move(public_path('logharian/'), $fileDocumentName);
                $log->file_pendukung = $fileDocumentName;
            }
        }
        $log->save();
        return redirect()->route('logharian.index');
    }

    public function destroy($id)
    {
        $logharian = LogHarian::where('id', $id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if (!$logharian) {
            return redirect()->route('logharian.index');
        }
        if ($logharian->file_pendukung) {
            $oldfile_pendukung = public_path('logharian/' . $logharian->file_pendukung);
            if (file_exists($oldfile_pendukung)) {
                unlink($oldfile_pendukung);
            }
        }
        $logharian->delete();

        return redirect()->route('logharian.index');
    }
}
