<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">


    <link href="{{asset('fontawesome-free-5.15.4-web/css/all.min.css')}}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap-5.1.0-dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  </head>
  <body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('dashboard') }}">
      {{ config('app.name','B.Guayaquil') }}
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="{{ Auth::user()->name  }} .. aqui puedes realizar tus busquedas" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="nav-link px-3" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();" >Salir</a>
        </form>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard')?'active':'' }}" aria-current="page" href="{{ route('dashboard') }}">
                <i class="fas fa-home"></i>
              Inicio
            </a>

          </li>

          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('bancos')?'active':'' }}" href="{{ route('bancos') }}">
                <i class="fas fa-university"></i>
              Bancos
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('clientes')?'active':'' }}" href="{{ route('clientes') }}">
            <i class="fas fa-users"></i>
              Clientes
            </a>
          </li>



        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          @endif

          @if(Session::has('estado'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>{{ Session::get('estado') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          @endif

        {{ $slot }}
      </div>
    </main>
  </div>
</div>


    <script src="{{ asset('bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js') }}"></script>
  </body>
</html>
