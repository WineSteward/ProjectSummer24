<x-layout>
    <x-slot:heading>Jobs</x-slot:heading>
    <ul>
        @foreach ($jobs as $job)
            <li><a class="text-blue-600 hover:underline" href="/jobs/{{$job['id']}}">{{$job['title']}}</a></li>
        @endforeach
    </ul>
</x-layout>