@extends('layouts.app')

@section('content')
{{-- <nav class="navbar navbar-light bg-light navbar-expand-lg">
    <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
            data-mdb-target="#navbarCenteredExample" aria-controls="navbarCenteredExample"
            aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-bold"
                        href="#"
                        id="navbarDropdownMenuLink"
                        role="button"
                        data-mdb-toggle="dropdown"
                        aria-expanded="false"
                        v-pre>
                        Jefe inmediato
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach ($jefes as $jefe)
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    {{$jefe->jefe_inmediato}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-bold"
                        href="#"
                        id="filtro2"
                        role="button"
                        data-mdb-toggle="dropdown"
                        aria-expanded="false"
                        v-pre>
                        Ubicaci&oacute;n
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="filtro2">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                --------
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-bold"
                        href="#"
                        id="filtro3"
                        role="button"
                        data-mdb-toggle="dropdown"
                        aria-expanded="false"
                        v-pre>
                        Departamento
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="filtro3">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                --------
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-bold"
                        href="#"
                        id="filtro4"
                        role="button"
                        data-mdb-toggle="dropdown"
                        aria-expanded="false"
                        v-pre>
                        Puesto
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="filtro4">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                --------
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle text-bold"
                        href="#"
                        id="filtro5"
                        role="button"
                        data-mdb-toggle="dropdown"
                        aria-expanded="false"
                        v-pre>
                        Tipo
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="filtro5">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                --------
                            </a>
                        </li>
                    </ul>
                </li> 
            </ul>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav> --}}
{{-- <div class="card-header">Filtro: {{$filtro}} Valor: {{$valor}}</div> --}}
<div class="col-10 offset-1 py-5">
    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
        @foreach ($empleados as $empleado)
            <div class="card">
                <img class="card-img-top" src="{{ asset('img/sin_imagen.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h2 class="lowercase">{{$empleado->nombre_completo}}</h2>
                    <h3></h3>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="py-4 col-10 offset-1">
    <small> {{ $empleados->onEachSide(1)->links()}} </small>
</div>

@endsection
