<?php

use App\Models\Job;
use Illuminate\Support\Arr;
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


Route::get('/jobs', function () {

    $jobs = Job::with('employer')->latest()->simplePaginate(5);

    return view('jobs/index', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/create', function(){

    return view('jobs/create');
});

Route::post('/jobs', function() {

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => '1' //vai ser implementado posteriormente pois vamos usar o ID proveniente da empresa que criou o Job
    ]);
    
    return redirect('/jobs');
});

Route::get('/jobs/{id}', function ($id)  {
    
    $job = Job::find($id);

    return view('jobs/show', ['job' => $job]);
});
