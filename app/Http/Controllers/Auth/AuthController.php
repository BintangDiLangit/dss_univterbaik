<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function do(Request $request)
    {
        if ($request->email == 'helmy@gmail.com' && $request->password == 'helmy') {
            return redirect('dashboard');
        }
        return redirect('login');
    }
}