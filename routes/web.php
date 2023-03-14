<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegistrerController;
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

Route::get('/', function () {
    return view('auth.login');
})->name('home');

//importamos la clase del controlador y aqui se mandan a llamar las acciones de GET,POST,PUT,DESTROY
//SE RECOMIENDA DARLE UN NOMBRE A NUESTRAS RUTAS PARA NO TENER LINKS CAIDOS
Route::get('/crear-cuenta', [RegistrerController::class,'index'])->name('register');
Route::post('/crear-cuenta', [RegistrerController::class,'store']);
//ruta para acceder al muro iniciando sesion
Route::get('/muro',[PostController::class,'index'])->name('post.index');
//rutas para login
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
//ruta para cerrar sesion
Route::post('logout',[LogoutController::class,'store'])->name('logout');
