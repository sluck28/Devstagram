<?php

use App\Http\Controllers\ImagenController;
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


//rutas para login
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

//ruta para cerrar sesion
Route::post('/logout',[LogoutController::class,'store'])->name('logout');

//para crear un post
Route::get('/post/create',[PostController::class,'create'])->name('post.create');

//ruta para acceder al muro iniciando sesion y hacer una variable con {} para que nos muestre un url al entrar al muro
Route::get('/{user:username}',[PostController::class,'index'])->name('post.index');

//Ruta para subir una imagen
Route::post('/imagenes',[ImagenController::class,'store']);