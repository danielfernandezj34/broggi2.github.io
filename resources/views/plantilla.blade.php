<!DOCTYPE html>
<html lang="en" id="principal">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('js/popper.js') }}">
    <title>@yield('titulo')</title>
    <link rel="icon" href="{{ asset('img/sems-logo.png') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body data-tipo="@yield('color_fons')">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <img src="{{ asset('img/sems-logo.png') }}" alt=""height="50">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" id="navbarColor01">
            <ul class="navbar-nav ml-auto mr-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->nom}} {{ Auth::user()->cognoms }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @yield('incidencies')
                        <a class="dropdown-item" href="{{ url('/logout')}}">Tancar Sessió</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid" id="app">
        @yield('container')
    </div>
    <a href="@yield('boto_atras')"><i class="far fa-arrow-alt-circle-left fa-3x" data-atras="@yield('color-atras')" id="atras"></i></a>
</body>
<script src="{{ asset('js/app.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script> --}}
<script src="{{ asset('js/popper.js') }}" charset="UTF-8"></script>
</html>
