<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', [AdminController::class, 'index']);

Route::get('/logout', function () {
    return view('auth.login');
});

Route::get('/prueba', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Home
Route::get('/Administrador/inicio', [AdminController::class, 'index'])->name('Administrador.inicio');
Route::get('/Administrador/inicio/exportar/empleados', [AdminController::class, 'exportarEmpleados'])->name('Administrador.inicio.exportar');
Route::get('/Administrador/inicio/descargar/pdf', [AdminController::class, 'datosPdf'])->name('Administrador.inicio.pdf');
Route::get('/Administrador/inicio/descargar/excel/a', [AdminController::class, 'datosExcel'])->name('Administrador.inicio.excel');
Route::get('/Administrador/inicio/descargar/excel/b', [AdminController::class, 'empleadosSinAsistenciaExcel'])->name('Administrador.inicio.excel.b');
// Sesiones
Route::get('/Administrador/sesiones', [AdminController::class, 'sesiones'])->name('Administrador.sesiones.index');
Route::get('/Administrador/sesiones/{id}', [AdminController::class, 'showSesion'])->name('Administrador.sesiones.showSesion');
Route::get('/Administrador/buscar/{tallerista}', [AdminController::class, 'buscar'])->name('Administrador.sesiones.buscar');
    // Rutas para exportación a PDF y Excel
Route::get('/Administrador/sesiones/exportar/sesiones', [AdminController::class, 'exportpdf'])->name('Administrador.sesiones.pdf');
Route::get('/Administrador/sesiones/descargar/pdf', [AdminController::class, 'descargarpdf'])->name('Administrador.sesiones.pdf.download');
Route::get('/Administrador/sesiones/descargar/excel', [AdminController::class, 'exportarExcel'])->name('Administrador.sesiones.excel.download');
    // Descargar los asistentes de x sesión
Route::get('/Administrador/asistentes/descargar/excel/{id}', [AdminController::class, 'exportAsistentes'])->name('Administrador.asistentes.excel.download');
//Asistentes
Route::get('/Administrador/asistentes', [AdminController::class, 'asistentes'])->name('Administrador.asistentes.index');
Route::get('/Administrador/asistentes/{id}', [AdminController::class, 'asistente'])->name('Administrador.asistentes.show');
Route::get('/Administrador/asistentes/{filtro}/{valor}', [AdminController::class, 'asistentesFiltros'])->name('Administrador.asistentes.filtros');
//Talleristas
Route::get('/Administrador/talleristas', [AdminController::class, 'talleristas'])->name('Administrador.talleristas.index');
// Para editar registros


Route::get('/Administrador/faka/data', [AdminController::class, 'asiganrDatosRanndom'])->name('Administrador.fakeData');

//
Route::get('/Tallerista/inicio', [App\Http\Controllers\TalleristaController::class, 'index'])->name('Tallerista.inicio');

//
Route::get('/RecursosHumanos/inicio', [App\Http\Controllers\RecursosController::class, 'index'])->name('RecursosHumanos.inicio');
