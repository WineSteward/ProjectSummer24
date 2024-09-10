<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::view('/about', 'about');

Route::view('/contacts', 'contacts');

//-------------------------JOBS ROUTES-----------------------------------

Route::resource('jobs', JobController::class); //cria as 7 rotas bases de um CRUD Controller

/*
Route::get('/jobs', [JobController::class, 'index']);

Route::get('/jobs/create', [JobController::class, 'create']);

Route::post('jobs', [JobController::class, 'store']);

Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

Route::patch('/jobs/{job}', [JobController::class, 'update']);

Route::delete('/jobs/{job}', [JobController::class, 'destroy']); */