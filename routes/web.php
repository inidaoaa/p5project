<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('guru', App\Http\Controllers\GuruController::class)->middleware('auth');
Route::resource('jurusan', App\Http\Controllers\JurusanController::class)->middleware('auth');
Route::resource('mapel', App\Http\Controllers\MapelController::class)->middleware('auth');
Route::resource('kelas', App\Http\Controllers\KelasController::class)->middleware('auth');
Route::resource('siswa', App\Http\Controllers\SiswaController::class)->middleware('auth');
