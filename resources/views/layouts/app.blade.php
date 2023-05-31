<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Inclure jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-link {{ Request::is('home') ? 'active' : '' }}" aria-current="page" href="{{ url('home') }}">Accueil</a>
                        </li>
                        @if (Auth::check() && Auth::user()->hasRole('Admin'))
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('DG') ? 'active' : '' }}" href="{{ url('/DG') }}">Direction</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('a_voir') ? 'active' : '' }}" href="{{ url('GRH') }}">Finances</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ url('GRH') }}">GRH</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('Cli') ? 'active' : '' }}" href="{{ url('Cli') }}">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('equipement') ? 'active' : '' }}" href="{{ url('equipement') }}">Equipements</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        @php
                        $count = auth()->user()->unreadNotifications->count();
                        @endphp
                        <li class="nav-item d-flex me-4">
                            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#notifs" aria-controls="notifs">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill mt-2" viewBox="0 0 16 16">
                                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                                </svg>
                                <span>{{$count}}</span>
                            </button>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

        <main class="">
            @if(Auth::check())
            <!-- OFCANVAS NOTIFICATIONS -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="notifs" aria-labelledby="notifs">
                <div class="offcanvas-header">
                    <h5 id="notifs">Nouvelle Notifications</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    @if (auth()->user()->unreadNotifications->count() >= 0)
                    <!-- Marquer comme lue -->
                    <a href="{{route('markAllRead')}}" id="markAllRead" class="btn btn-sm btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                        </svg> Marqer tout comme lue
                    </a>
                    <ul class="list-group">
                        @if(auth()->user()->unreadNotifications)
                        @foreach (auth()->user()->unreadNotifications as $notification)
                        <li class="list-group-item d-flex">
                            <div class="">
                                {!! $notification->data['message'] !!}
                                @if(isset($notification->data['url']))
                                <a href="{{ $notification->data['url'] }}">Voir la commande</a>
                                @endif
                            </div>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                    @endif
                </div>
            </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>


</html>