<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\JabatanFungsional;
use App\Models\JenisCuti;
use App\Models\PegawaiFungsional;
use App\Models\PerizinanCuti;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
// use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerizinanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $year = now()->year; // Mengambil tahun saat ini
        $totalRiwayatCuti = PerizinanCuti::where('user_id', $user->id)
            ->whereYear('tgl_mulai', $year)
            ->count();

        $sisaCuti = 60 - $totalRiwayatCuti ; //59
        $totalCutiDiambil = $totalRiwayatCuti; //59




        // dd($totalRiwayatCuti);

        $perizinan = PerizinanCuti::where('user_id', $user->id)
            ->with('jeniscuti')
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('pegawai.perizinan.index', compact(['perizinan','sisaCuti', 'totalCutiDiambil']));
    }

    public function create()
    {
        $jeniscuti = JenisCuti::all();
        return view('pegawai.perizinan.create', compact('jeniscuti'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $pegawaiFungsional = PegawaiFungsional::with('unit_kerja_has_jabatan_fungsional.unitkerja')
            ->where('user_id', $user->id)
            ->first();
        // dd($pegawaiFungsional->unit_kerja_has_jabatan_fungsional->unitkerja->name);
        if (!$pegawaiFungsional) {
            // dd('buat jabatan fungsional terleih dalu');
            return redirect()
                ->route('perizinan-cuti.index')
                ->with('error', 'Anda Harus Memiliki Jabatan Fungsional dulu');
        }
        $attrs = $request->validate([
            'alasan' => 'required',
            'alamat_selama_cuti' => 'required',
            'jenis_cuti' => 'required|exists:jenis_cutis,id', // Pastikan jenis_cuti adalah ID yang valid
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
        ]);
        $year = now()->year; // Mengambil tahun saat ini
        $totalRiwayatCuti = PerizinanCuti::where('user_id', $user->id)
            ->whereYear('tgl_mulai', $year)
            ->count();
        if($totalRiwayatCuti > 60 ){
            return redirect()
                ->route('perizinan-cuti.index')
                ->with('error', 'Anda Sudah Mengambil Jatah Cuti');
        }

        $perizinanCuti = new PerizinanCuti();
        $perizinanCuti->user_id = $user->id;
        $perizinanCuti->unit_kerja_id = $pegawaiFungsional->unit_kerja_has_jabatan_fungsional->unitkerja->id;

        $perizinanCuti->alasan = $attrs['alasan'];
        $perizinanCuti->alamat_selama_cuti = $attrs['alamat_selama_cuti'];
        $perizinanCuti->jenis_cuti_id = $attrs['jenis_cuti'];
        $perizinanCuti->tgl_mulai = $attrs['tgl_mulai'];
        $perizinanCuti->tgl_selesai = $attrs['tgl_selesai'];

        $perizinanCuti->save();

        return redirect()->route('perizinan-cuti.index');
    }

    public function edit($id)
    {
        $jabatan = JabatanFungsional::find($id);
        // dd($jabatan);
        if (!$jabatan) {
            return redirect()->route('jabatan-fungsional.index');
        }

        return view('admin.kepegawaian.jabatan_fungsional.edit', compact('jabatan'));
    }

    public function update(Request $request, $id)
    {
        $jabatan = JabatanFungsional::find($id);
        // dd($pegawai);
        if (!$jabatan) {
            dd('not found');
        }
        $attrs = $request->validate([
            'name' => 'required|unique:jabatan_fungsionals',
        ]);
        $jabatan->name = $attrs['name'];
        $jabatan->save();
        return redirect()->route('jabatan-fungsional.index');
    }

    public function destroy(Request $request, $id)
    {
        $perizinan = PerizinanCuti::find($id);
        if (!$perizinan) {
            return redirect()->route('perizinan-cuti.index');
        }
        $perizinan->delete();
        return redirect()->route('perizinan-cuti.index');
    }

    public function exportPdf()
    {
        // Within a controller method or route closure
        $data = [
            'invoiceNumber' => 'INV123',
            'amount' => 100.0,
            // Add more data as needed
        ];

        $pdf = FacadePdf::loadView('admin.template.pdf_perizinan', $data);
        return $pdf->download('invoice.pdf');
    }
    public function overview()
    {
        return view('admin.template.pdf_perizinan');
    }
}
