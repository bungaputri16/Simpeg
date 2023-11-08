<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SuratMenyurat;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class SuratMenyuratController extends Controller
{
    public function personal(){
        $user = JWTAuth::parseToken()->authenticate();

        $surat = SuratMenyurat::with(['pengirim','penerima','unitkerja'])->where('penerima_id',$user->id)
        ->orderBy('created_at','desc')
        ->get();
        return response()->json([
            'message' => 'berhasil',
            'data' => $surat
        ]);
    }
}
