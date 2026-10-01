<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;



Route::get('/app', function () {return view('vistas.app');});

Route::get('/welcome', function () {return view('welcome');})->name('welcome');

Route::get('/', function () {return view('inicio');})->name('inicio');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
