<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MatrixController;
use App\Http\Controllers\SkalaController;
use App\Http\Controllers\ViewMenuController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('login', function () {
    return view('welcome');
});
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'do'])->name('do');

// Route::middleware('auth')->group(function () {
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::resource('alternatif', AlternatifController::class);
Route::resource('skala', SkalaController::class);
Route::resource('kriteria', KriteriaController::class);
Route::get('bobot', [BobotController::class, 'index'])->name('bobot.index');
Route::get('matrix', [MatrixController::class, 'index'])->name('matrix.index');

Route::prefix('saw')->group(function () {
    Route::get('vmatrixkeputusan', [ViewMenuController::class, 'vmatrixkeputusan'])->name('vmatrixkeputusan');
    Route::get('vnormalisasi', [ViewMenuController::class, 'vnormalisasi'])->name('vnormalisasi');
    Route::get('vrangking', [ViewMenuController::class, 'vrangking'])->name('vrangking');
});

Route::prefix('wp')->group(function () {
    Route::get('wpjumbobot', [ViewMenuController::class, 'wpjumbobot'])->name('wpjumbobot');
    Route::get('wpnilais', [ViewMenuController::class, 'wpnilais'])->name('wpnilais');
    Route::get('wpnilaiv', [ViewMenuController::class, 'wpnilaiv'])->name('wpnilaiv');
    Route::get('wpnormalisasiterbobot', [ViewMenuController::class, 'wpnormalisasiterbobot'])->name('wpnormalisasiterbobot');
    Route::get('wppangkat', [ViewMenuController::class, 'wppangkat'])->name('wppangkat');
    Route::get('wpsums', [ViewMenuController::class, 'wpsums'])->name('wpsums');
});

// });
