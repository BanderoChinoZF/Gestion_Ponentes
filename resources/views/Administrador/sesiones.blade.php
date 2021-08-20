@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-9 col-xl-10 p-1 p-lg-4">
      <div class="card-header text-center font-sans text-xl font-bold">
        SESIONES
      </div>
      <div class="card-body">
        {{-- cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
          @foreach ($sesiones as $a)
            <div class="col">
              <div class="card h-100 p-0">
                {{-- Se coloca la imagen sin imagen por default --}}
                <img src="{{ asset('img/sin_imagen.png') }}" class="card-img-top" alt="Sesion sin imagen">
                <div class="card-body">
                  <h5 class="card-title"><strong>Sesi&oacute;n</strong> {{ $a->idsesion }}</h5>
                  <strong>Tallerista</strong> {{ $a->tallerista }}
                  <small class="text-muted">{{ $a->fecha }}</small>
                </div>
                <div class="card-footer">
                  <a href="{{ route('Administrador.sesiones.showSesion', $a->idsesion) }}" class="btn btn-block text-white normal-case" style="background-color: #da2c4e">
                    Detalles
                  </a>
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
    {{-- Talleristas --}}
    <div class="col col-md-4 col-lg-3 col-xl-2 p-1 p-lg-4">
      <div class="card p-0 p-md-2">
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

  {{-- Botones para descargas --}}
  <div class="col-12 col-md-8 col-lg-9 col-xl-10 d-flex justify-content-end p-4">
    <div class="btn-group" role="group">
      <a href="{{ route('Administrador.sesiones.pdf.download') }}" class="btn text-white normal-case" style="background-color: #da2c4e">
        <i class="far fa-file-pdf"></i> PDF 
      </a>
      <a href="{{ route('Administrador.sesiones.excel.download') }}" class="btn text-white normal-case" style="background-color: #107c41">
        <i class="fas fa-file-excel"></i> Excel
      </a>
    </div>
  </div>
</div>
@endsection
