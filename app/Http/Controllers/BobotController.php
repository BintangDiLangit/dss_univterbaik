<?php

namespace App\Http\Controllers;

use App\Models\Bobot;

class BobotController extends Controller
{
    public function index()
    {
        $bobot = Bobot::all();
        return view('bobot.index', compact('bobot'));
    }
}