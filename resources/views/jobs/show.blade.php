<x-layout>
    <x-slot:heading>{{$job->title}}</x-slot:heading>

    <h1>This job pays on average {{$job->salary}}€ per year (free of taxes)</h1>

    @can('edit', $job)
        <div class="mt-10">
            <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
        </div>
    @endcan
</x-layout>