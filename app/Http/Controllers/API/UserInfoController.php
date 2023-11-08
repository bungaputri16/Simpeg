<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AlamatdanKontak;
use App\Models\Keluarga;
use App\Models\Kepegawaian;
use App\Models\Kependudukan;
use App\Models\Lainlain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserInfoController extends Controller
{
    public function profileInfo()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $base_url = url('/');
        if ($user->photo) {
            $user->photo = $base_url . '/images/photo/' . $user->photo;
        }

        return response()->json([
            'message' => 'berhasil',
            'data' => $user,
        ]);
    }
    public function updateProfilefileInfo(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $attrs = $request->validate([
            'name' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nama_ibu' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg,gif,avif|max:2048',
        ]);
        $user->nip = $attrs['nip'];
        $user->name = $attrs['name'];
        $user->email = $attrs['email'];
        $user->jenis_kelamin = $attrs['jk'];
        $user->tempat_lahir = $attrs['tempat_lahir'];
        $user->tanggal_lahir = $attrs['tanggal_lahir'];
        $user->nama_ibu = $attrs['nama_ibu'];
        if ($request->file()) {
            if ($request->file) {
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
        }
        $user->update();
        $base_url = url('/');
        if ($user->photo) {
            $user->photo = $base_url . '/images/photo/' . $user->photo;
        }
        return response()->json([
            'message' => 'berhasil',
            'data' => $user,
        ]);
    }

    public function kependudukanInfo()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $kependudukan = Kependudukan::where('user_id',$user->id)->first();

        if (!$kependudukan) {
            return response()->json([
                'message' => 'data kependudukan belum ada',
            ]);
        }
        return response()->json([
            'message' => 'berhasil',
            'data' => $kependudukan,
        ]);
    }

    public function updateKependudukanInfo(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $request->validate([
            'nik' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'file' => 'max:2048'
        ]);
        // $user = Auth::user();
        $kedudukan = Kependudukan::where('user_id', $user->id)->first();
        $kedudukan->nik = $request->input('nik');
        $kedudukan->agama = $request->input('agama');
        $kedudukan->kewarganegaraan = $request->input('kewarganegaraan');
        if($request->hasFile('file')){
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
        return response()->json([
            'message' => 'berhasil',
            'data' => $kedudukan,
        ]);
    }

    public function keluargaInfo()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $keluarga = Keluarga::find($user->id);

        if (!$keluarga) {
            return response()->json([
                'message' => 'data keluarga belum ada',
            ]);
        }
        return response()->json([
            'message' => 'berhasil',
            'data' => $keluarga,
        ]);
    }

    public function updateKeluargaInfo(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $validator = Validator::make($request->all(), [
            'status_perkawinan' => 'string',
            'nama_pasangan' => 'string',
            'pekerjaan_pasangan' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $data = $request->only(['status_perkawinan', 'nama_pasangan', 'pekerjaan_pasangan']);

        $user->update($data);
    }

    public function kepegawaianInfo()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $kepegawaian = Kepegawaian::find($user->id);

        if (!$kepegawaian) {
            return response()->json([
                'message' => 'data kepegawaian belum ada',
            ]);
        }
        return response()->json([
            'message' => 'berhasil',
            'data' => $kepegawaian,
        ]);
    }

    public function updateKepegawaianInfo(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $validator = Validator::make($request->all(), [
            'jabatan_fungsional' => 'string',
            'unit_jurusan' => 'string',
            'jabatan_struktural' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $data = $request->only(['jabatan_fungsional', 'unit_jurusan', 'jabatan_struktural']);

        $user->update($data);
    }

    public function alamatDanKontakInfo()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $alamatdankontak = AlamatdanKontak::find($user->id);

        if (!$alamatdankontak) {
            return response()->json([
                'message' => 'data alamatdankontak belum ada',
            ]);
        }
        return response()->json([
            'message' => 'berhasil',
            'data' => $alamatdankontak,
        ]);
    }

    public function updateAlamatdankontakInfo(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $validator = Validator::make($request->all(), [
            'email' => 'email',
            'alamat' => 'string',
            'rt' => 'string',
            'rw' => 'string',
            'desa_kelurahan' => 'string',
            'provinsi' => 'string',
            'kodepos' => 'string',
            'no_telp_rumah' => 'string',
            'no_hp' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $data = $request->only(['email', 'alamat', 'rt', 'rw', 'desa_kelurahan', 'provinsi', 'kodepos', 'no_telp_rumah', 'no_hp']);

        $user->update($data);
    }

    public function lainlainInfo()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $lainlain = Lainlain::find($user->id);

        if (!$lainlain) {
            return response()->json([
                'message' => 'data lainlain belum ada',
            ]);
        }
        return response()->json([
            'message' => 'berhasil',
            'data' => $lainlain,
        ]);
    }

    public function updateLainlainInfo(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $validator = Validator::make($request->all(), [
            'npwp' => 'string',
            'nama_wajib_pajak' => 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $data = $request->only(['npwp', 'nama_wajib_pajak']);

        $user->update($data);
    }
}
