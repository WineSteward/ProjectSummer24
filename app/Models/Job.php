<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    public static function all()
    {
        return 
        [
            [
                'id' => "1",
                'title' => 'Director',
                'salary' => '100,000'
            ],
            [
                'id' => "2",
                'title' => 'Professor',
                'salary' => '10,000'
            ],
            [
                'id' => "3",
                'title' => 'Farmer',
                'salary' => '70,000'
            ]
        ];
    }

    public static function find($id) : array
    {
        $jobs = static::all();

        $job = Arr::first($jobs, fn($job) => $job['id'] == $id);
        
        if(! $job)
            abort(404);

        return $job;
    }
}
