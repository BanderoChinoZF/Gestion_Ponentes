@extends('layouts.app')

@section('content')

<div class="container p-2 p-lg-4">
  <div class="card-header p-0">
    <div class="row col-10">
      <div class="col-5 col-md-3 col-lg-2">
        <a href="{{ route('Administrador.sesiones.index')}}" 
          class="btn btn-small text-sm normal-case text-light" 
          style="background-color: #da2c4e; border-radius: 15px;">
          <i class="fas fa-caret-left"></i>
          Volver
        </a>
      </div>
    </div>
    <div class="text-center text-lg font-bold col-12 col-md-6 col-lg-8">Sesiones de el(la) tallerista {{$tallerista->nombre_tallerista}} </div>
    {{-- <div class="text-center col-12 col-sm-6 text-lg font-bold">Tallerista: {{$sesion->tallerista}} </div> --}}
  </div>
  <div class="card-body">
    {{-- cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
      @foreach ($resultados as $a)
        <div class="col">
          <div class="card h-100 p-0">
            {{-- <img src="{{ $a->imagen }}" class="card-img-top" alt=""> --}}
            <img src="{{ asset('img/sin_imagen.png') }}" class="card-img-top" alt="Sesion sin imagen">
            <div class="card-body">
              <h5 class="card-title"><strong>Sesi&oacute;n</strong> {{ $a->idsesion }}</h5>
              <strong>Tallerista</strong> {{ $a->tallerista }}
              <small class="text-muted">{{ $a->fecha }}</small>
            </div>
            <div class="card-footer">
              <a href="{{ route('Administrador.sesiones.showSesion', $a->idsesion) }}" class="btn btn-block" style="background-color: #da2c4e"> detalles</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    {{-- cards --}}
  </div>
  <br><br><br>
  <div class="card-footer">
    {{$resultados->links()}}
  </div>
    {{-- <div class="card p-1">
    </div> --}}
</div>



@endsection
