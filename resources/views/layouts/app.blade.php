<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" type="module"></script>
    <script src="{{ asset('js/script.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="bg-black">
<div id="app" class="w-11/12 md:w-9/12 md:mx-0 m-auto">
    <div class="py-5" id="title">
        <a class="navbar-brand text-purple-500" href="{{ url('/') }}">
            <span class="text-3d text-6xl md:text-9xl">Giphy</span>
        </a>
    </div>
    <nav class="navbar navbar-expand-md navbar-light bg-black shadow-sm">
        <div class="container">

            <button class="navbar-toggler bg-purple-500 mb-1" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon bg-purple-500 text-white"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto d-none">

                </ul>
                @if(isset($categories))
                    <div class="flex flex-col md:flex-row">
                        @foreach($categories as $category)
                            <a class="md:mt-1 md:bg-purple-500 md:hover:bg-purple-700 text-white font-bold md:py-2 md:px-4 rounded md:mx-2 md:text-center"
                               href="{{ url('categories/?category='.$category->id) }}">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
            @endif
            <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto text-white">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item hover:bg-purple-500 hover:rounded-3xl">
                                <a class="nav-link text-white font-extrabold uppercase md:py-2 md:px-4"
                                   href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item hover:bg-purple-500 hover:rounded-3xl">
                                <a class="nav-link text-white font-extrabold uppercase md:py-2 md:px-4"
                                   href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white font-extrabold uppercase"
                               href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item font-extrabold uppercase" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @include('flash-message')
        @yield('content')
    </main>
</div>
</body>
</html>
