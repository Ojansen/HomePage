<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300" rel="stylesheet"> 

    <link href="https://use.fontawesome.com/releases/v5.0.2/css/all.css" rel="stylesheet">

    <script   src="https://code.jquery.com/jquery-3.3.1.js"
              integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
              crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body onload="startTime()">
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-trans">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @guest
                        @else
                        <a class="nav-link">
                            <button class="btn btn-sm align-middle btn-outline-warning" data-toggle="modal" data-target="#Remove">Remove</button>
                        </a>
                        <a class="nav-link">
                            <button class="btn btn-sm align-middle btn-outline-success" data-toggle="modal" data-target="#addBookmark">Add</button>
                        </a>
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <button class="btn btn-sm align-middle btn-outline-danger" type="button">Logout</button>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
            @yield('content')

    </div>
</body>
</html>
