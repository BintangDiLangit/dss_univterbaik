<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Bobot;
use App\Models\Kriteria;
use App\Models\MatrixKeputusan;
use App\Models\Skala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('kriteria.index', compact('kriteria'));
    }

    public function accumulateBobotandMatrix()
    {
        MatrixKeputusan::whereNotNull('id_matrix')->delete();
        Bobot::whereNotNull('id_bobot')->delete();

        $kriteria = Kriteria::orderBy('id_kriteria', 'asc')->get();
        $banyakKriteria = count($kriteria);

        // Bobot
        $valueBobotFinal = [];
        for ($i = 1; $i <= count($kriteria); $i++) {
            $decreaseKriteria = $banyakKriteria - $i + 1;
            $k = 1;
            for ($j = 1; $j <= $decreaseKriteria; $j++) {
                $valueBobotAwal[$j] = (1 / ($j));
                $k++;
            }
        }
        for ($i = 1; $i <= count($kriteria); $i++) {
            $valueBobotAwal2 = 0;

            for ($j = $i; $j <= count($kriteria); $j++) {
                $valueBobotAwal2 += $valueBobotAwal[$j];
            }
            $valueBobotFinal = number_format($valueBobotAwal2 / count($kriteria), 3);
            Bobot::create([
                'id_kriteria' => $kriteria[$i - 1]->id_kriteria,
                'valuebobot' => $valueBobotFinal
            ]);
        }

        // Matrix
        $alternatif = Alternatif::all();
        $bobot = Bobot::all();
        $skala = Skala::all();

        $accumulateLoopingMatrix = count($alternatif) * count($bobot);
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
            Kriteria::create([
                'nm_kriteria' => $request->nama_kriteria
            ]);

            KriteriaController::accumulateBobotandMatrix();

            DB::commit();
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
            $kriteria = Kriteria::find($id);
            $kriteria->nm_kriteria = $request->nama_kriteria;
            $kriteria->save();

            KriteriaController::accumulateBobotandMatrix();

            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::find($id);
        try {
            DB::beginTransaction();

            MatrixKeputusan::whereNotNull('id_matrix')->delete();
            Bobot::whereNotNull('id_bobot')->delete();

            $kriteria->delete();
            KriteriaController::accumulateBobotandMatrix();
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}