<x-layout>
    <x-slot:heading>Jobs Listing</x-slot:heading>
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a class="rouded-md hover:underline block px-4 py-6 border border-gray-200" href="/jobs/{{$job->id}}">
                <div class="text-sm font-bold">
                    {{$job->employer->name}}
                </div>
                <div>
                    {{$job->title}}
                </div>
            </a>
        @endforeach

        <div>
            {{ $jobs->links()}}
        </div>
    </div>
</x-layout>