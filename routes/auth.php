<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//Rota para cadastramento de usuario
Route::get('/cadastrar', [AuthController::class, 'register'])->name('register');

//Rota para salvar o usuario
Route::post('/cadastrar', [AuthController::class, 'store']);

//Rota para cadastramento de usuario
Route::get('/entrar', [AuthController::class, 'login'])->name('login');

//Rota para salvar o usuario
Route::post('/entrar', [AuthController::class, 'authenticate']);

//Rota para logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
