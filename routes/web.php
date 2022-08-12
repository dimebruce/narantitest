<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\SociosController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamosController;
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
    return view('modulos.login');
});

Auth::routes();

Route::get('Inicio', [InicioController::class,'index']);

Route::get('perfil', [UsuariosController::class, 'perfil']);
Route::put('perfil', [UsuariosController::class, 'perfilUpdate']);

Route::get('Usuarios', [UsuariosController::class,'index']);

Route::get('Socios', [SociosController::class,'index']);
Route::post('Socios', [SociosController::class, 'socios']);
Route::get('editarSocio/{id}', [SociosController::class, 'edit']);
Route::put('actualizarSocio/{id}', [SociosController::class, 'update']);
Route::get('eliminarSocio/{id}', [SociosController::class, 'destroy']);
Route::post('Crear-Prestamo', [SociosController::class, 'crearSocioPrestamo']);


Route::get('Libros', [LibroController::class, 'index']);
Route::post('Libros', [LibroController::class, 'store']);

Route::get('Crear-Prestamo', [PrestamosController::class, 'create']);
Route::post('Crear-Prestamo', [PrestamosController::class, 'store']);
Route::get('prestamo/{id}', [PrestamosController::class, 'prestamo']);
Route::post('prestamo/{id}', [PrestamosController::class, 'agregarPrestamo']);
Route::post('quitarLibroPrestamo/{id}', [PrestamosController::class, 'quitarLibroPrestado']);
Route::get('Morosos', [PrestamosController::class, 'mostrarMorosos']);
