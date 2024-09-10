<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contacts', function () {
    return view('contacts');
});


//-------------------------JOBS ROUTES-----------------------------------
Route::get('/jobs', [JobController::class, 'index']);

Route::get('/jobs/create', [JobController::class, 'create']);

Route::post('jobs', [JobController::class, 'store']);

Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

Route::patch('/jobs/{job}', [JobController::class, 'update']);

Route::delete('/jobs/{job}', [JobController::class, 'destroy']);