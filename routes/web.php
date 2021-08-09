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
Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/logout', function () {
    return view('auth.login');
});
Route::get('/prueba', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//
Route::get('/Administrador/inicio', [App\Http\Controllers\AdminController::class, 'index'])->name('Administrador.inicio');

//
Route::get('/Tallerista/inicio', [App\Http\Controllers\TalleristaController::class, 'index'])->name('Tallerista.inicio');

//
Route::get('/RecursosHumanos/inicio', [App\Http\Controllers\RecursosController::class, 'index'])->name('RecursosHumanos.inicio');