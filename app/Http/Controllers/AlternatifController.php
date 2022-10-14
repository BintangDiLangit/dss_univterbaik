<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    public function index()
    {
        $alternatif = Alternatif::all();
        return view('alternatif.index', compact('alternatif'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            Alternatif::create([
                'nm_alternatif' => $request->nama_alternatif
            ]);
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
        $alternatif = Alternatif::find($id);
        if ($alternatif->delete()) {
            return redirect()->back();
        }
        return redirect()->back();
    }
}