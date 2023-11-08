<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\AlamatdanKontak;
use App\Models\Keluarga;
use App\Models\Kepegawaian;
use App\Models\Kependudukan;
use App\Models\Lainlain;
use App\Models\PegawaiFungsional;
use App\Models\PegawaiHasStruktural;
use App\Models\TandaTangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->input('tahun'));
        $user = Auth::user();
        $kependudukan = Kependudukan::where('user_id', $user->id)->first();
        $keluarga = Keluarga::where('user_id', $user->id)->first();
        $kepegawaian = Kepegawaian::where('user_id', $user->id)->first();
        $alamatdankontak = AlamatdanKontak::where('user_id', $user->id)->first();
        $lainlain = Lainlain::where('user_id', $user->id)->first();
        $tandaTangan = TandaTangan::where('user_id', $user->id)->first();

        $pegawaiFungsional = PegawaiFungsional::with('unit_kerja_has_jabatan_fungsional.unitkerja')->where('user_id',$user->id)->first();
        $pegawaiStruktural = PegawaiHasStruktural::with('jabatanStruktural')->where('users_id',$user->id)->first();
    //    dd($pegawaiStruktural);
        $unitkerjaPegawai = "";
        $jabatanFungsionalPegawai = "";
        $jabatanStrukturalPegawai = "";
        if($pegawaiFungsional){
            $unitkerjaPegawai = $pegawaiFungsional->unit_kerja_has_jabatan_fungsional->unitkerja->name;
            $jabatanFungsionalPegawai = $pegawaiFungsional->unit_kerja_has_jabatan_fungsional->name;
        }
        if($pegawaiStruktural){
            if($pegawaiStruktural->jabatanStruktural){
                $jabatanStrukturalPegawai = $pegawaiStruktural->jabatanStruktural->name;

            }
        }

        
        // dd($pegawaiFungsional);
        //  dd($kepegawaian);
        return view('pegawai.profile.index', [
            'user' => $user,
            'kependudukan' => $kependudukan,
            'keluarga' => $keluarga,
            'kepegawaian' => $kepegawaian,
            'alamatdankontak' => $alamatdankontak,
            'lainlain'=>$lainlain,
            'tandaTangan' => $tandaTangan,
            'unitkerjaPegawai' => $unitkerjaPegawai,
            'jabatanFungsionalPegawai' => $jabatanFungsionalPegawai,
            'jabatanStrukturalPegawai' => $jabatanStrukturalPegawai
        ]);
    }

    public function editProfile(Request $request)
    {
        $user = Auth::user();

        return view('pegawai.profile.edit_profil', [
            'user' => $user,
        ]);
    }

    public function storeProfile(Request $request)
    {
        // dd($request->file_pendukung);

        $attrs = $request->validate([
            'name' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nama_ibu' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $userid = Auth::user()->id;
        $user = User::find($userid);
        $user->nip = $attrs['nip'];
        $user->name = $attrs['name'];
        $user->email = $attrs['email'];
        $user->jenis_kelamin = $attrs['jk'];
        $user->tempat_lahir = $attrs['tempat_lahir'];
        $user->tanggal_lahir = $attrs['tanggal_lahir'];
        $user->nama_ibu = $attrs['nama_ibu'];
        if($request->file()){
            if($request->file){
                if ($user->photo) {
                    $oldImage = public_path('images/photo/' . $user->photo);
                    if (file_exists($oldImage)) {
                        unlink($oldImage);
                    }
                }
    
                $imageName = time() . '.' . $request->file->extension();
                $request->file->move(public_path('images/photo/'), $imageName);
                $user->photo = $imageName;
            }
            // if($request->file_pendukung){
            //     if ($user->file_pendukung) {
            //         $oldImage = public_path('document/file_pendukung/' . $user->file_pendukung);
            //         if (file_exists($oldImage)) {
            //             unlink($oldImage);
            //         }
            //     }
            //     $imageName = time() . '.' . $request->file->extension();
            //     $request->file->move(public_path('document/file_pendukung/'), $imageName);
            //     $user->file_pendukung = $imageName;
            // }
        }

        $user->update();

        return redirect()
            ->route('profile.index')
            ->with('success', 'Profil diperbarui!');
    }

    public function editKedudukan()
    {
        $user = Auth::user();
        $kependudukan = Kependudukan::where('user_id', $user->id)->first();

        return view('pegawai.profile.edit_kedudukan',[
            'kependudukan' => $kependudukan
        ]);
    }

    public function updateKedudukan(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'file' => 'max:2048'
        ]);
        $user = Auth::user();
        $kedudukan = Kependudukan::where('user_id', $user->id)->first();
        $kedudukan->nik = $request->input('nik');
        $kedudukan->agama = $request->input('agama');
        $kedudukan->kewarganegaraan = $request->input('kewarganegaraan');
        if($request->file()){
            if ($kedudukan->file_pendukung) {
                $oldImage = public_path('document/file_pendukung/' . $kedudukan->file_pendukung);
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }
            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('document/file_pendukung/'), $imageName);
            $kedudukan->file_pendukung = $imageName;
        }
        $kedudukan->save();
        return redirect()
            ->route('profile.index')
            ->with('success', 'Kependudukan diperbarui atau dibuat jika tidak ada sebelumnya!');
    }

    public function editKepegawaian()
    {
       
        $user = Auth::user();
        $kepegawaian = Kepegawaian::where('user_id', $user->id)->first();

        return view('pegawai.profile.edit_kepegawaian',[
            'kepegawaian' => $kepegawaian
        ]);
    }

    public function updateKepegawaian(Request $request)
    {
        
        $user = Auth::user();
        $kepegawaian = Kepegawaian::where('user_id', $user->id)->first();
        // dd($request->all());
        $kepegawaian->jabatan_fungsional = $request->input('jabatan_fungsional');
        $kepegawaian->unit_jurusan = $request->input('unit_jurusan');
        $kepegawaian->jabatan_struktural = $request->input('jabatan_struktural');

        $kepegawaian->update();

        return redirect()
            ->route('profile.index')
            ->with('success', 'Kependudukan diperbarui atau dibuat jika tidak ada sebelumnya!');
            
    }

    public function editKeluarga()
    {
        
        $user = Auth::user();
        $keluarga = Keluarga::where('user_id', $user->id)->first();
       
        return view('pegawai.profile.edit_keluarga',[
            'keluarga' => $keluarga
        ]);
    }

    public function updateKeluarga(Request $request)
    {
        $attrs = $request->validate([
            'status_perkawinan' => 'required',
        ]);
        $user = Auth::user();
        $keluarga = Keluarga::where('user_id', $user->id)->first();
        if( $attrs['status_perkawinan'] != 'menikah' ){
            $keluarga->nama_pasangan = "";
            $keluarga->pekerjaan_pasangan = "";
        }else{
            $keluarga->nama_pasangan = $request->input('nama_pasangan');
            $keluarga->pekerjaan_pasangan = $request->input('pekerjaan_pasangan');
        }
        $keluarga->status_perkawinan = $request->input('status_perkawinan');
        if($request->file()){
            if ($keluarga->file_pendukung) {
                $oldImage = public_path('document/file_pendukung/' . $keluarga->file_pendukung);
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }
            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('document/file_pendukung/'), $imageName);
            $keluarga->file_pendukung = $imageName;
        }
        $keluarga->update();

        return redirect()
            ->route('profile.index')
            ->with('success', 'Kependudukan diperbarui atau dibuat jika tidak ada sebelumnya!');
    }
    

    public function editAlamatkontak()
    {
        
        $user = Auth::user();
        $alamatdankontak = AlamatdanKontak::where('user_id', $user->id)->first();

        return view('pegawai.profile.edit_alamatkontak',[
            'alamatdankontak' => $alamatdankontak
        ]);

    }

    public function updateAlamatkontak(Request $request)
    {
        $user = Auth::user();
        // dd($request->all());
        
        $alamatdankontak = AlamatdanKontak ::where('user_id', $user->id)->first();
        $alamatdankontak->provinsi = $request->input('nama_provinsi'); // clear
        $alamatdankontak->kota = $request->input('nama_kabupaten'); // clear
        $alamatdankontak->kecamatan = $request->input('nama_kecamatan');
        $alamatdankontak->desa_kelurahan = $request->input('nama_desa');
        $alamatdankontak->rt = $request->input('rt');
        $alamatdankontak->rw = $request->input('rw');
        $alamatdankontak->alamat = $request->input('alamat');
        $alamatdankontak->kodepos = $request->input('kodepos');
        $alamatdankontak->no_telp_rumah = $request->input('no_telp_rumah');
        $alamatdankontak->no_hp = $request->input('no_hp');

        $alamatdankontak->update();

        return redirect()
            ->route('profile.index')
            ->with('success', 'Kependudukan diperbarui atau dibuat jika tidak ada sebelumnya!');
    }


    public function editLainlain()
    {
         
        $user = Auth::user();
        $lainlain = Lainlain::where('user_id', $user->id)->first();

        return view('pegawai.profile.edit_lainlain',[
            'lainlain' => $lainlain
        ]);
    }

    public function updateLainlain(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $lainlain = Lainlain ::where('user_id', $user->id)->first();

        $lainlain->npwp = $request->input('npwp');
        $lainlain->nama_wajib_pajak = $request->input('nama_wajib_pajak');
        if($request->file()){
            if ($lainlain->file_pendukung) {
                $oldImage = public_path('document/file_pendukung/' . $lainlain->file_pendukung);
                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }
            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('document/file_pendukung/'), $imageName);
            $lainlain->file_pendukung = $imageName;
        }
        $lainlain->update();

        return redirect()
            ->route('profile.index')
            ->with('success', 'Kependudukan diperbarui atau dibuat jika tidak ada sebelumnya!');
    }

    public function editTandaTangan()
    {
         
        $user = Auth::user();
        $tandaTangan = TandaTangan::where('user_id', $user->id)->first();
        return view('pegawai.profile.edit_tandatangan',[
            'tandaTangan' => $tandaTangan
        ]);
    }
    public function updateTandaTangan(Request $request) {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Get the authenticated user
        $user = Auth::user();
    
        // Find the user's existing tandaTangan or create a new one
        $tandaTangan = TandaTangan::firstOrNew(['user_id' => $user->id]);
    
        // Check if an old image exists and delete it
        if ($tandaTangan->image) {
            $oldImage = public_path('images/tandatangan/' . $tandaTangan->image);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }
    
        // Upload and store the new image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/tandatangan/'), $imageName);
    
        // Update the tandaTangan model with the new image name
        $tandaTangan->image = $imageName;
        $tandaTangan->save();
    
        return redirect()->route('profile.index')->with('success', 'Profile image updated successfully');
    }

    public function deleteTandaTangan(){
        $user = Auth::user();
    
        // Find the user's existing tandaTangan or create a new one
        $tandaTangan = TandaTangan::firstOrNew(['user_id' => $user->id]);
    
        // Check if an old image exists and delete it
        if ($tandaTangan->image) {
            $oldImage = public_path('images/tandatangan/' . $tandaTangan->image);
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }

        $tandaTangan->image = null;
        $tandaTangan->save();
    
        return redirect()->route('profile.index')->with('success', 'Profile image updated successfully');
    }
    
    
    
    public function downloadFilePendukung($name){

    }



}
