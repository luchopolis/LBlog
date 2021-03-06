<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- FontAwesome -->
   <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- FLoatBUtton Style-->
    <link href="{{ asset('css/floatbutton.css') }}" rel="stylesheet">

    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">

    <style>
        .successPost{
            width: 50%;
            position: absolute;
            bottom: 25%;
            left: 25%;
            animation: hide 7s forwards;
            
            
        }

        .successProfile {
            width: 50%;
            position: absolute;
            top:20%;
            left: 25%;
            animation: hide 7s forwards;
        }

        @keyframes hide{
            0%{
                opacity: 1;
            }

            100%{
                opacity: 0;
            }
        }

    </style>
</head>
<body style="background-color: #1b1e2b">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #090b10 !important">
            <div class="container">
               <a class="navbar-brand" href="/home">
                    <img src="{{ asset('src/Cheto.png') }}" width="40" height="40" alt="" class="rounded">
                    
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/posts">Posts</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}">
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
            @yield('content')
        </main>
    </div>
    <div class="fab-container" >
        <a href="/post/create" style="text-decoration: none;">
            <div class="fab-icon-holder">
                <i class="fas fa-plus"></i>
            </div>
        </a>
    </div>
    <!-- JQUERY-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




</body>
</html>
