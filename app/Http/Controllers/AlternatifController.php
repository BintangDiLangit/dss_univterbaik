<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Bobot;
use App\Models\Kriteria;
use App\Models\MatrixKeputusan;
use App\Models\Skala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatif = Alternatif::all();
        return view('alternatif.index', compact('alternatif'));
    }

    public function accumulateMatrix()
    {
        $kriteria = Kriteria::orderBy('id_kriteria', 'asc')->get();
        $alternatif = Alternatif::orderBy('id_alternatif', 'asc')->get();
        $bobot = Bobot::all();
        $skala = Skala::all();
        if (count($alternatif) == count($skala)) {
            MatrixKeputusan::whereNotNull('id_matrix')->delete();
            for ($i = 0; $i < count($alternatif) - 1; $i++) {
                for ($j = 0; $j < count($kriteria); $j++) {
                    MatrixKeputusan::create([
                        'id_alternatif' => $alternatif[$i]->id_alternatif,
                        'id_bobot' => $bobot[$j]->id_bobot,
                        'id_skala' => $skala[$i]->id_skala,
                    ]);
                }
            }
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            Alternatif::create([
                'nm_alternatif' => $request->nama_alternatif
            ]);
            DB::commit();
            AlternatifController::accumulateMatrix();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $alternatif = Alternatif::find($id);
            $alternatif->nm_alternatif = $request->nama_alternatif;
            $alternatif->save();
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $alternatif = Alternatif::find($id);
            MatrixKeputusan::where('id_alternatif', $id)->delete();
            $alternatif->delete();
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }
}