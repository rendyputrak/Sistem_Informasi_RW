<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/landing', function () {
    return view('landing', ['judul' => 'RW 03 Bunulrejo']);
});

