<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;


Route::get('/app', function () {return view('vistas.app');});
Route::get('/', function () {$usuarios = Usuario::all();

    return view('inicio', compact('usuarios'));})->name('inicio');


//Route::get('/usuario/editar/{id}', function () {return view('usuario.editar');})->name('usuario.editar');

Auth::routes();


//Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/usuario/editar/{id}', [UsuarioController::class, 'editar'])->name('usuario.editar');

Route::put('/usuario/update/{id}', [UsuarioController::class,'update'])->name('usuario.update');
Route::get('/usuario', [UsuarioController::class, 'inicio'])->name('inicio');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/registro', [LoginController::class, 'registro'])->name('registro');
//Route::get('/usuario/register', [UsuarioController::class,'register'])->name('usuario.register');
Route::post('/usuario/store', [UsuarioController::class,'store'])->name('usuario.store');
Route::delete('usuario/destroy/{id}', [UsuarioController::class, 'destroy'])->name('usuario.destroy');