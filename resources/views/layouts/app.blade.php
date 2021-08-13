<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Fresnillo ::: Gestion De Sesiones</title>

        <!-- Font Awesome -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
        rel="stylesheet"
        />
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
        
        {{-- tailwind --}}
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <!-- Estilos Propios CSS -->
        <link href="{{ asset('css/login.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #da2c4e">
                <!-- Container wrapper -->
                <div class="container-fluid">
                    <!-- Toggle button -->
                    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                        data-mdb-target="#navbarCenteredExample" aria-controls="navbarCenteredExample"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                    </button>

                    <!-- Collapsible wrapper -->
                    <div class="collapse navbar-collapse justify-content-center"
                        id="navbarCenteredExample">

                        <a class="navbar-brand" href="#">
                            <img
                                src="{{ asset('img/logo-gestion-sinfondo.png')}}"
                                class="me-2"
                                height="40"
                                width="40"
                                alt=""
                                loading="lazy"
                            />
                            <small class="text-bold text-light">Fresnillo</small>
                        </a>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <!-- @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif -->

                            @else
                                <li class="nav-item dropdown">
                                    <a
                                        class="nav-link dropdown-toggle text-bold text-light"
                                        href="#"
                                        id="navbarDropdownMenuLink"
                                        role="button"
                                        data-mdb-toggle="dropdown"
                                        aria-expanded="false"
                                        v-pre
                                    >{{ Auth::user()->name }}</a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                Cerrar Sesión
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                        </ul>
                                </li>         
                            @endguest
                        </ul>
                    </div>
                    <!-- Collapsible wrapper -->
                </div>
                <!-- Container wrapper -->
            </nav>

            @guest

            @else
                <nav class="navbar fixed-bottom navbar-expand text-light p-0" style="background-color: #da2c4e;">
                    <!-- Container wrapper -->
                    <div class="container-fluid">
                        <!-- Toggle button -->
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-mdb-toggle="collapse"
                            data-mdb-target="#navbarBottom"
                            aria-controls="navbarCenteredExample"
                            aria-expanded="false"
                            aria-label="Toggle navigation" >
                            <i class="fas fa-bars"></i>
                        </button>

                        <!-- Collapsible wrapper -->
                        <div class="collapse navbar-collapse justify-content-center"
                            id="navbarBottom" >
                            <!-- Left links -->
                            <ul class="navbar-nav text-center">
                                <li class="nav-item">
                                    <a class="{{ request()->routeIs('Administrador.inicio')? 'nav-link active font-sans font-bold':'nav-link'}} text-light hover:bg-red-800 px-5"
                                        aria-current="page" 
                                        href="{{ route('Administrador.inicio') }}">
                                        <i class="fas fa-home d-inline-block"> </i>
                                        <label class="d-block text-xs">Inicio </label>
                                        {{-- Home --}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="{{ request()->routeIs('Administrador.sesiones.*')? 'nav-link active font-sans font-bold':'nav-link'}} text-light hover:bg-red-800 px-5"
                                        aria-current="page" 
                                        href="{{ route('Administrador.sesiones.index') }}">
                                        <i class="fas fa-object-group d-inline-block"> </i> 
                                        <label class="d-block text-xs">Sesiones </label>
                                        {{-- Sesiones --}}
                                    </a>
                                </li>
                            </ul>
                            <!-- Left links -->
                        </div>
                        <!-- Collapsible wrapper -->
                    </div>
                    <!-- Container wrapper -->
                </nav>
            @endguest
            
            <main>
                <br><br>
                @yield('content')
                <br><br>
            </main>
        </div>


        <footer class="bg-light text-center text-white">
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright:
                <a class="text-white" href="#">Fresnillo</a>
            </div>
            <!-- Copyright -->
        </footer>

        <!-- Scripts -->
        @yield('scripts')
        <script src="{{ asset('js/misFunciones.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/forDatatables.js') }}" type="text/javascript"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <!-- MDB -->
        <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
        ></script>

        <!-- JQUERY -->
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous">
        </script>
        <!-- DATATABLES -->
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
        </script>



    </body>
</html>
