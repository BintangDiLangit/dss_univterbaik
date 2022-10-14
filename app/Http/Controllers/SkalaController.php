<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            Skala::create([
                'nm_skala' => $request->nama_skala,
                'value' => $request->value
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
        $skala = Skala::find($id);
        if ($skala->delete()) {
            return redirect()->back();
        }
        return redirect()->back();
    }
}