@extends('layouts.app')

@section('content')
    <div>
        <div class="flex items-center justify-center mb-3">
            <div class="flex border-2 rounded w-full">
                <input type="text" class="px-4 py-2 w-full" placeholder="Search...">
                <button class="flex items-center justify-center px-4 border-l bg-purple-500">
                    <svg class="w-6 h-6 text-gray-600" fill="white" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24">
                        <path
                            d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                    </svg>
                </button>
            </div>
            <div class="ml-1">
                <a class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded" href="{{ url('upload') }}" onclick="">
                    Upload
                </a>
            </div>
        </div>
        <div class="grid gap-4 grid-cols-3 grid-rows-3">

          @foreach($gifs as $gif)
                <img  class="" alt="Responsive image" src="{{$gif->url}}" />
            @endforeach
        </div>
    </div>
@endsection
