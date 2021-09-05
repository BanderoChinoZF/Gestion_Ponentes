@extends('layouts.app')

@section('content')

<div class="container">

  {{-- Body --}}
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-9 col-xl-10 p-1 p-lg-4">
    {{-- encabezado --}}
      <div class="card-header text-center font-sans text-xl font-bold">
        SESIONES
        <form action="" method="post">
          <div class="d-flex justify-content-end">
            <input type="text" class="form-control" placeholder="Ingrese la fecha" aria-describedby="button">
            <button type="submit" class="btn btn-danger rouded-circle text-wrap" id="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </form>
      </div>
      <div class="card-body">
        @if ($resultados->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @foreach ($resultados as $a)
                    <div class="col">
                    <div class="card h-100 p-0">
                        {{-- Se coloca la imagen sin imagen por default --}}
                        {{-- <img src="{{ asset('img/sin_imagen.png') }}" class="card-img-top" alt="Sesion sin imagen"> --}}
                        <img src="@if ($a->ruta_imagen)
                        {{ asset($a->ruta_imagen) }}
                        @else
                        {{ asset('img/sin_imagen.png') }}
                        @endif" alt="" class="img-fluid rounded h-40" style="object-fit: cover;">
                        <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <label class="py-2"><strong>Sesi&oacute;n</strong></label>
                            <label class="py-2">{{ $a->idsesion }}</label>
                        </div>
                        <div class="d-flex justify-content-between">
                            <label class="py-2"><strong>Tallerista</strong></label>
                            <label class="py-2">{{ $a->tallerista }}</label>
                        </div>
                        
                        <div class="d-flex justify-content-end">
                            <label class="text-sm text-muted py-2">{{ $a->fecha }}</label>
                        </div>
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
        @else
            <div>SIN RESULTADOS</div>
        @endif
      </div>
      <div class="card-footer">
        {{$resultados->links()}}
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

<br><br>
@endsection