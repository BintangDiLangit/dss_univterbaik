<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Bobot;
use App\Models\Kriteria;
use App\Models\MatrixKeputusan;
use App\Models\Skala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkalaController extends Controller
{
    public function index()
    {
        $skala = Skala::all();
        return view('skala.index', compact('skala'));
    }

    public function accumulateMatrix()
    {
        MatrixKeputusan::whereNotNull('id_matrix')->delete();
        // Matrix
        $kriteria = Kriteria::orderBy('id_kriteria', 'asc')->get();
        $alternatif = Alternatif::all();
        $bobot = Bobot::all();
        $skala = Skala::all();

        for ($i = 0; $i < count($alternatif); $i++) {
            for ($j = 0; $j < count($kriteria); $j++) {
                MatrixKeputusan::create([
                    'id_alternatif' => $alternatif[$i]->id_alternatif,
                    'id_bobot' => $bobot[$j]->id_bobot,
                    'id_skala' => $skala[$i]->id_skala,
                ]);
            }
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            Skala::create([
                'nm_skala' => $request->nama_skala,
                'value' => $request->value
            ]);

            DB::commit();
            SkalaController::accumulateMatrix();

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
            $skala = Skala::find($id);
            $skala->nm_skala = $request->nama_skala;
            $skala->value = $request->value;
            $skala->save();
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
            $skala = Skala::find($id);
            $skala->delete();
            DB::commit();
            SkalaController::accumulateMatrix();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }
}