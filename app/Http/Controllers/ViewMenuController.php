<?php

namespace App\Http\Controllers;

use App\Models\Views\VMatrixKeputusan;
use App\Models\Views\VNormalisasi;
use App\Models\Views\VRangking;
use App\Models\Views\WPJumbobot;
use App\Models\Views\WPNilais;
use App\Models\Views\WPNilaiv;
use App\Models\Views\WPNormalisasiterbobot;
use App\Models\Views\WPPangkat;
use App\Models\Views\WPSums;
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

    public function wpjumbobot()
    {
        $wpjumbobot = WPJumbobot::all();
        return view('wpjumbobot.index', compact('wpjumbobot'));
    }
    public function wpnilais()
    {
        $wpnilais = WPNilais::all();
        return view('wpnilais.index', compact('wpnilais'));
    }
    public function wpnilaiv()
    {
        $wpnilaiv = WPNilaiv::all();
        return view('wpnilaiv.index', compact('wpnilaiv'));
    }
    public function wpnormalisasiterbobot()
    {
        $wpnormalisasiterbobot = WPNormalisasiterbobot::all();
        return view('wpnormalisasiterbobot.index', compact('wpnormalisasiterbobot'));
    }
    public function wppangkat()
    {
        $wppangkat = WPPangkat::all();
        return view('wppangkat.index', compact('wppangkat'));
    }
    public function wpsums()
    {
        $wpsums = WPSums::all();
        return view('wpsums.index', compact('wpsums'));
    }
}
