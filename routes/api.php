<?php

use App\Http\Controllers\AgendaAcaraController;
use App\Http\Controllers\BeritaPengumumanController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\UMKMController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Routing API Berita Pengumuman
Route::get('/pengumuman', [BeritaPengumumanController::class, 'index']);

//Routing API Agenda Acara
Route::get('/acara', [AgendaAcaraController::class, 'index']);

//Routing API Penduduk
Route::get('/penduduk', [PendudukController::class, 'index']);

//Routing API umkm
Route::get('/umkm', [UMKMController::class, 'index']);