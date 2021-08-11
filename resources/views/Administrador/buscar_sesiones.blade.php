@extends('layouts.app')

@section('content')

<h1>
    ------
</h1>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Sesiones del tallerista ZZZZ</h2>
        </div>
        <div class="card-body">
            {{-- cards --}}
          <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($resultados as $a)
              <div class="col">
                <div class="card h-100">
                  {{-- <img src="{{ $a->idsesion }}" class="card-img-top" alt="Sesion sin imagen"> --}}
                  <img src="{{ asset('img/sin_imagen.png') }}" class="card-img-top" alt="Sesion sin imagen">
                  <div class="card-body">
                    <h5 class="card-title"><strong>Sesi&oacute;n</strong> {{ $a->idsesion }}</h5>
                    <p class="card-text"> <strong>Tallerista</strong> {{ $a->tallerista }}</p>
                  </div>
                  <a href="{{ route('Administrador.sesiones.showSesion', $a->idsesion) }}" class="btn btn-primary"> detalles</a>
                  <div class="card-footer">
                    <small class="text-muted">{{ $a->fecha }}</small>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          {{$resultados->links()}}
          {{-- cards --}}
        </div>
    </div>

</div>



@endsection
