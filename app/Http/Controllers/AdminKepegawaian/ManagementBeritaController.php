<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\JabatanStruktural;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagementBeritaController extends Controller
{
    public function index(){
        $berita = Berita::paginate(8);
        return view('admin.kepegawaian.berita.index', compact('berita'));
    }
    public function detail($id){
        $berita = Berita::find($id);
        if(!$berita){
            dd('gada');
        }
        return view('admin.kepegawaian.berita.detail', compact('berita'));
    }
    
    public function create(){
        return view('admin.kepegawaian.berita.create');
    }

    public function store(Request $request) {
 
        // dd($request->all());
        $attrs = $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);
        $fileDocumentName = null; // Inisialisasi nama file menjadi null

        if ($request->hasFile('file')) {
            $fileDocumentName = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('berita/'), $fileDocumentName);
        }

        Berita::create([
            'judul' => $attrs['judul'],
            'isi' => $attrs['isi'],
            'gambar' => $fileDocumentName, // Menggunakan $fileDocumentName yang sudah diinisialisasi
        ]);

        return redirect()->route('news.index');
    }

    public function edit($id){
        $berita = Berita::find($id);
        if (!$berita) {
            dd('Gagal Menemukan Berita');
        }

            return view ('admin.kepegawaian.berita.edit', compact('berita'));
    }

    public function update(Request $request,$id){

        $berita = Berita::find($id);
        if(!$berita){
            dd('Gagal Menemukan Berita');
        }
        $attrs = $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);
        $fileDocumentName = $berita->gambar; // Inisialisasi nama file gambar dari data yang ada
    
        if ($request->hasFile('file')) {
            // Jika ada gambar baru yang diupload, simpan gambar baru
            $fileDocumentName = time() . '.' . $request->file('file')->extension();
            $request->file('file')->move(public_path('berita/'), $fileDocumentName);
            
            // Hapus gambar lama (opsional)
            if ($berita->gambar && file_exists(public_path('berita/' . $berita->gambar))) {
                unlink(public_path('berita/' . $berita->gambar));
            }
        }
        $berita->update([
            'judul' => $attrs['judul'],
            'isi' => $attrs['isi'],
            'gambar' => $fileDocumentName,
        ]);
        
        return redirect()->route('news.index');
    
    }
    
    // public function edit($id){
        
    //     $jabatan = JabatanStruktural::find($id);
    //     // dd($jabatan);
    //     if(!$jabatan){
    //         return redirect()->route('jabatan-struktural.index');
    //     }

    //     return view('admin.kepegawaian.jabatan_struktural.edit', compact('jabatan'));


    // }

    // public function update(Request $request,$id){
    //     $jabatan = JabatanStruktural::find($id);
    //     // dd($pegawai);
    //     if(!$jabatan){
    //         dd('not found');
    //     }
    //     $attrs = $request->validate([
    //         'name' => 'required|unique:jabatan_strukturals',
    //     ]);
    //     $jabatan->name = $attrs['name'];
    //     $jabatan->save();
    //     return redirect()->route('jabatan-struktural.index');

    // }

    public function destroy($id)
    {

        $berita = Berita::find($id);

        if (!$berita) {
            dd('gada');
        }

        // Check if an old image exists and delete it
        if ($berita->gambar) {
            $oldgambar = public_path('berita/' . $berita->gambar);
            if (file_exists($oldgambar)) {
                unlink($oldgambar);
            }
        }

        $berita->delete();

        return redirect()->route('news.index');
    }
}
