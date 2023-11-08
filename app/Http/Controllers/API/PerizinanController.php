<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PegawaiFungsional;
use App\Models\PerizinanCuti;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class PerizinanController extends Controller
{
    public function index()
    {
        $user = JWTAuth::parseToken()->authenticate();
        $perizinan = PerizinanCuti::where('user_id', $user->id)
            ->with('jeniscuti')
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        $pegawaiFungsional = PegawaiFungsional::with('unit_kerja_has_jabatan_fungsional.unitkerja')
            ->where('user_id', $user->id)
            ->first();

        if (!$pegawaiFungsional) {
            return response()->json([
            'message' => 'gagal',
            'data' => 'user belum memiliki jabatan fungsional',
        ]);
        }
        return response()->json([
            'message' => 'success',
            'data' => $perizinan,
        ]);
    }

    public function store(Request $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $pegawaiFungsional = PegawaiFungsional::with('unit_kerja_has_jabatan_fungsional.unitkerja')
            ->where('user_id', $user->id)
            ->first();
        // dd($pegawaiFungsional->unit_kerja_has_jabatan_fungsional->unitkerja->name);
        if (!$pegawaiFungsional) {
            return response()->json([
                'message' => 'gagal',
                'data' => 'user belum memiliki jabatan fungsional',
            ]);
        }
        $attrs = $request->validate([
            'alasan' => 'required',
            'alamat_selama_cuti' => 'required',
            'jenis_cuti' => 'required|exists:jenis_cutis,id', // Pastikan jenis_cuti adalah ID yang valid
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
        ]);

        $perizinanCuti = new PerizinanCuti();
        $perizinanCuti->user_id = $user->id;
        $perizinanCuti->unit_kerja_id = $pegawaiFungsional->unit_kerja_has_jabatan_fungsional->unitkerja->id;

        $perizinanCuti->alasan = $attrs['alasan'];
        $perizinanCuti->alamat_selama_cuti = $attrs['alamat_selama_cuti'];
        $perizinanCuti->jenis_cuti_id = $attrs['jenis_cuti'];
        $perizinanCuti->tgl_mulai = $attrs['tgl_mulai'];
        $perizinanCuti->tgl_selesai = $attrs['tgl_selesai'];

        $perizinanCuti->save();

        return response()->json([
            'message' => 'success',
            'data' => $perizinanCuti,
        ]);
    }
}
