<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'UTPL') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  @stack('js')
  <script type="text/javascript">
  $(document).ready(function(){
    var font_size = localStorage.getItem("font_size");
    if(typeof font_size =='string'){
      $('#contenedor-principal').css('font-size',font_size);
    }
  });

  function ajustarTexto(){
    var font_size = $('#contenedor-principal').css('font-size');
    if(font_size=='16px'){
      new_font_size='18px';
    }
    if(font_size=='18px'){
      new_font_size='20px';
    }
    if(font_size=='20px'){
      new_font_size='22px';
    }
    if(font_size=='22px'){
      new_font_size='16px';
    }
    $('#contenedor-principal').css('font-size',new_font_size);
    localStorage.setItem("font_size", new_font_size);
  }
</script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

<!-- Styles -->
<!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel bg-light">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'UTPL') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            @can('asignaturas.index')
            <li class="nav-item">
              <a class="nav-link" href="{{route('asignaturas.index')}}">Asignaturas</a>
            </li>
            @endcan
            @can('users.index')
            <li class="nav-item">
              <a class="nav-link" href="{{route('users.index')}}">Usuarios</a>
            </li>
            @endcan
            @can('roles.index')
            <li class="nav-item">
              <a class="nav-link" href="{{route('roles.index')}}">Roles</a>
            </li>
            @endcan
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="ajustarTexto();">Ajustar texto</a>
            </li>
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
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          @yield('breadcrumbs')
        </div>
      </div>
    </div>
    @if (session('info'))
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="alert alert-success" role="alert">
            {{ session('info') }}
          </div>
        </div>
      </div>
    </div>
    @endif
    @if (session('info_error'))
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="alert alert-danger" role="alert">
            {{ session('info_error') }}
          </div>
        </div>
      </div>
    </div>
    @endif
    <div class="container" id="contenedor-principal">
      <div class="row justify-content-center">
        <div class="col-md-12">
          @yield('content')
        </div>
      </div>
    </div>
  </main>
</div>
</body>
</html>
