@props(['active' => false])

<a {{$attributes}} class="rounded-md px-3 py-2 font-medium text-sm {{$active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white'}}"
>{{$slot}}</a>