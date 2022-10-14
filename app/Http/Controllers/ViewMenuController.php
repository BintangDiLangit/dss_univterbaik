<?php

namespace App\Http\Controllers;

use App\Models\Views\VMatrixKeputusan;
use App\Models\Views\VNormalisasi;
use App\Models\Views\VRangking;
use Illuminate\Http\Request;

class ViewMenuController extends Controller
{
    public function vmatrixkeputusan()
    {
        $vmatrixkeputusan = VMatrixKeputusan::all();
        return view('vmatrixkeputusan.index', compact('vmatrixkeputusan'));
    }
    public function vnormalisasi()
    {
        $vnormalisasi = VNormalisasi::all();
        return view('vnormalisasi.index', compact('vnormalisasi'));
    }
    public function vrangking()
    {
        $vrangking = VRangking::all();
        return view('vrangking.index', compact('vrangking'));
    }
}