@extends('layouts.app')

@section('content')

<br>
<br>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-header text-center font-sans text-xl font-bold">
          SESIONES
        </div>
        <div class="card-body">
          {{-- cards --}}
          <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($sesiones as $a)
              <div class="col">
                <div class="card h-100">
                  {{-- <img src="{{ $a->imagen }}" class="card-img-top" alt=""> --}}
                  <img src="{{ asset('img/sin_imagen.png') }}" class="card-img-top" alt="Sesion sin imagen">
                  <div class="card-body">
                    <h5 class="card-title"><strong>Sesi&oacute;n</strong> {{ $a->idsesion }}</h5>
                    <p class="card-text"> <strong>Tallerista</strong> {{ $a->tallerista }}</p>
                  </div>
                  <small class="text-muted">{{ $a->fecha }}</small>
                  <div class="card-footer">
                    <a href="{{ route('Administrador.sesiones.showSesion', $a->idsesion) }}" class="btn btn-block" style="background-color: #da2c4e"> detalles</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          <br><br><br>
          {{-- cards --}}
        </div>
        <div class="card-footer">
          {{$sesiones->links()}}
        </div>
      </div>
    </div>
    <div class="col col-lg-2">
      <div class="card">
        <div class="card-header text-light text-center" style="background-color: #da2c4e;">
          <h2 class="font-sans text-lg"> Talleristas </h2>
        </div>
        @foreach ($talleristas as $tallerista)
        <div class="card-header hover:bg-red-50">
          <a href="{{ route('Administrador.sesiones.buscar',$tallerista->id)}}" class="text-sm">
            {{$tallerista->nombre_tallerista}}
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection
