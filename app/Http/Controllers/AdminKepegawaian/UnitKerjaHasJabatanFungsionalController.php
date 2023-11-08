<?php

namespace App\Http\Controllers\AdminKepegawaian;

use App\Http\Controllers\Controller;
use App\Models\UnitKerja;
use App\Models\UnitKerjaHasJabatanFungsional;
use Illuminate\Http\Request;

class UnitKerjaHasJabatanFungsionalController extends Controller
{
    public function create($id)
    {
        $unit = UnitKerja::find($id);
        if (!$unit) {
            return redirect()->route('unit-kerja.index');
        }
        return view('admin.kepegawaian.unit_kerja.jabatan_fungsional.create',[
            'unit' => $unit
        ]);
    }
    public function store(Request $request,$id){
        $unit = UnitKerja::find($id);

        if (!$unit) {
            return redirect()->route('unit-kerja.index');
        }
        // dd($request->all());
        $attrs = $request->validate([
            'name' => 'required',
        ]);
        UnitKerjaHasJabatanFungsional::create([
            'unit_kerja_id' => $id,
            'name' => $attrs['name'],
        ]);
        return redirect()->route('unit-kerja.detail', ['id' => $unit->id]);

    }
    public function edit($id)
    {
        // dd($idUnitHasJabatan);
        $jabatan = UnitKerjaHasJabatanFungsional::with('unitkerja')->find($id);
  
        if (!$jabatan) {
            return redirect()->route('unit-kerja.index');
        }

        return view('admin.kepegawaian.unit_kerja.jabatan_fungsional.edit', [
            'jabatan' => $jabatan,
        ]);
    }

    public function update(Request $request, $id)
    {

        $jabatan = UnitKerjaHasJabatanFungsional::with('unitkerja')->find($id);

        // dd($jabatan);
        if (!$jabatan) {
            return redirect()->route('unit-kerja.detail', ['id' => $id]);
        }
        $attrs = $request->validate([
            'name' => 'required',
        ]);
        $jabatan->name = $attrs['name'];
        $jabatan->save();
        return redirect()->route('unit-kerja.detail', ['id' => $jabatan->unitkerja->id]);
    }
    public function destroy($id)
    {
        $jabatan = UnitKerjaHasJabatanFungsional::with('unitkerja')->find($id);

        if (!$jabatan) {
            return redirect()->route('unit-kerja.index');
        }
        $jabatan->delete();
        return redirect()->route('unit-kerja.detail', ['id' => $jabatan->unitkerja->id]);
    }
}
