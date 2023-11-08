<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LogHarian;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogHarianController extends Controller
{
    public function index()
    {
        // agat keren
        $user = JWTAuth::parseToken()->authenticate();
        $log_harian = LogHarian::where('user_id', $user->id)->get();
        return response()->json([
            'message' => 'success',
            'data' => $log_harian
        ]);
    }
    public function store(Request $request)
    {
        // dd($request->file());
        $user = JWTAuth::parseToken()->authenticate();


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

        $log_harian = LogHarian::create([
            'user_id' => $user->id,
            'name' => $attrs['nama_aktivitas'],
            'deskripsi' => $attrs['deskripsi'],
            'waktu_mulai' => $attrs['jam_mulai'],
            'waktu_akhir' => $attrs['jam_selesai'],
            'file_pendukung' => $fileDocumentName, // Menggunakan $fileDocumentName yang sudah diinisialisasi
        ]);
        return response()->json([
            'message' => 'success',
            'data' => $log_harian
        ]);
    }
}
