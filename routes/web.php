<?php

use App\Http\Controllers\MetodeSAWController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BansosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Routing untuk beranda
Route::get('/', function () {
    return view('beranda', ['judul' => 'RW 03 Bunulrejo']);
});

// Routing untuk SPK
Route::get('/saw', [MetodeSAWController::class, 'index'])->name('saw.index');

// Routing Action Bansos
Route::put('/bansos/{bansos}/setujui', [BansosController::class, 'setujui'])->name('bansos.setujui');
Route::put('/bansos/{bansos}/tolak', [BansosController::class, 'tolak'])->name('bansos.tolak');

