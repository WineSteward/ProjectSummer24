<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);

        return view('jobs/index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs/create');
    }

    public function show(Job $job)
    {
        return view('jobs/show', ['job' => $job]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => '1' //vai ser implementado posteriormente pois vamos usar o ID proveniente da empresa que criou o Job
        ]);

        Mail::to($job->employer->user)->queue(new JobPosted($job));

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        return view('jobs/edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        //authorize ---- on hold

        //validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        //update the job and persist
        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        //redirect
        return redirect('jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {

        //authorize ---- on hold

        //delete job
        $job->delete();

        //redirect


        return redirect('/jobs');
    }
}
