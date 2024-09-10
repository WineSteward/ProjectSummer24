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

//index
Route::get('/jobs', function () {

    $jobs = Job::with('employer')->latest()->simplePaginate(3);

    return view('jobs/index', [
        'jobs' => $jobs
    ]);
});

//create
Route::get('/jobs/create', function(){

    return view('jobs/create');
});

//store
Route::post('/jobs', function() {

    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => '1' //vai ser implementado posteriormente pois vamos usar o ID proveniente da empresa que criou o Job
    ]);
    
    return redirect('/jobs');
});


//show
Route::get('/jobs/{id}', function ($id)  {
    
    $job = Job::find($id);

    return view('jobs/show', ['job' => $job]);
});

//edit
Route::get('/jobs/{id}/edit', function ($id)  {
    
    $job = Job::find($id);

    return view('jobs/edit', ['job' => $job]);
});

//update
Route::patch('/jobs/{job}', function (Job $job)  {

    //validate
    request()->validate([
        'title'=> ['required', 'min:3'],
        'salary'=> ['required']
    ]);
    //authorize ---- on hold

    //update the job and persist

    $job->update([
        'title' => request('title'),
        'salary' =>request('salary')
    ]);

    //redirect
    return redirect('jobs/' . $job->id);
});

//destroy
Route::delete('/jobs/{job}', function (Job $job)  {
    
    //authorize ---- on hold

    //delete job

    $job->delete();
    //redirect


    return redirect('/jobs');
});