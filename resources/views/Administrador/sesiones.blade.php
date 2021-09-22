@extends('layouts.app')

@section('content')

<div class="container">

  {{-- Body --}}
  <div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-9 col-xl-10 p-1 p-lg-4">
      @livewire('sesiones')
    </div>
    {{-- Talleristas --}}
    <div class="col col-md-4 col-lg-3 col-xl-2 p-1 p-lg-4">
      <div class="card p-0 p-md-2">
        <div class="card-header text-light text-center" style="background-color: #da2c4e;">
          <h2 class="font-sans text-lg"> Talleristas </h2>
        </div>
        @foreach ($talleristas as $tallerista)
          @if ($tallerista->id)
            <div class="card-header hover:bg-red-50">
              <a href="{{ route('Administrador.sesiones.buscar',$tallerista->id)}}" class="text-sm">
                {{$tallerista->nombre_tallerista}}
              </a>
            </div>
          @endif
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