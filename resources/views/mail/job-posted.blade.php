<h2>Job Posting</h2>

<p>
    Congratz your job with the title: {{$job->title}} has been posted on our website!!
</p>
<p>
    <a href="{{ url('/jobs/' . $job->id) }}">Click here to view</a>
</p>