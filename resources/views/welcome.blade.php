@extends('layouts.app')

@section('content')
    <div>
        <div class="flex items-center justify-center mb-3">
            <form class="flex border-2 rounded w-full" action="{{ url('search') }}" method="GET">
                <input type="text" name="search" id="search" class="px-4 py-2 w-full" placeholder="Search...">
                <button type="submit" class="flex items-center justify-center px-4 border-l bg-purple-500">
                    <svg class="w-6 h-6 text-gray-600" fill="white" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24">
                        <path
                            d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                    </svg>
                </button>
            </form>
            <div class="ml-1">
                <a class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2.5 px-4 rounded " href="{{ url('upload') }}">
                    Upload
                </a>
            </div>
        </div>
        @if(count($gifs) == 0)
            <div class="text-white text-center font-bold pt-3">There are no gifs in this category.</div>
        @endif
        <div class="grid gap-4 grid-cols-3 grid-rows-3">

          @foreach($gifs as $gif)
                <img class="image-gif hover:opacity-80 cursor-pointer" alt="Responsive image" src="{{$gif->url}}" onclick="copyClipboard(event.target.src)"/>
            @endforeach
        </div>
    </div>
@endsection
