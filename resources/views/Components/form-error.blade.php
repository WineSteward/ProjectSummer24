@props(['name'])

@error($name)
    <p class="mt-2 text-xd text-red-500 font-semibold">{{$message}}</p>
@enderror
