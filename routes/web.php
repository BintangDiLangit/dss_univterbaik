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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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

    Route::get('vmatrixkeputusan', [ViewMenuController::class, 'vmatrixkeputusan'])->name('vmatrixkeputusan');
    Route::get('vnormalisasi', [ViewMenuController::class, 'vnormalisasi'])->name('vnormalisasi');
    Route::get('vrangking', [ViewMenuController::class, 'vrangking'])->name('vrangking');
// });