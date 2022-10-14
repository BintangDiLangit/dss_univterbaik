<?php

namespace App\Http\Controllers;

use App\Models\MatrixKeputusan;
use Illuminate\Http\Request;

class MatrixController extends Controller
{
    public function index()
    {
        $matrix = MatrixKeputusan::all();
        return view('matrix.index', compact('matrix'));
    }
}