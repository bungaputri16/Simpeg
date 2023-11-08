<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class BeritaController extends Controller
{
    public function index()
    {
        // agat keren
        $user = JWTAuth::parseToken()->authenticate();
        $berita = Berita::paginate(10);
        return response()->json([
            'message' => 'success',
            'data' => $berita
        ]);
    }
}
