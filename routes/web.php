<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::view('/about', 'about');

Route::view('/contacts', 'contacts');

//-------------------------JOBS ROUTES-----------------------------------

Route::resource('jobs', JobController::class); //cria as 7 rotas bases de um CRUD Controller

//Authorization Route
Route::get('/register', [RegisteredUserController::class, 'create']);

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);

Route::post('/login', [SessionController::class, 'store']);
