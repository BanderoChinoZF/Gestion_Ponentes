@extends('layouts.app')

@section('content')

<div class="container  gy-8">
  <div class="row justify-content-center">
    <div class="relative pt-1"> {{-- Barra de porcentaje --}}
      <div class="flex mb-2 items-center justify-between">
        <div>
          <span class="text-xs md:tex-lg lg:text-xl font-semibold inline-block py-1 px-2 rounded-full text-red-600">
            {{$porcentaje['porcentaje_a']}}% del personal atendido
          </span>
        </div>
        <div class="text-right">
          <span class="text-xs font-semibold inline-block text-red-600">
            Personas atendidas: {{ $porcentaje['empleados_a'] }}
          </span>
        </div>
      </div>
      <div class="overflow-hidden h-4 mb-4 text-xs flex rounded bg-red-200">
        <div style="width:{{ $porcentaje['porcentaje_a'] }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500"></div>
      </div>
      <div class="flex mb-2 items-center justify-between">
        <div>
          {{-- Necesario para que el el siguiente div sea alineado a la derecha --}}
        </div>
        <div class="text-right">
          <span class="text-xs font-semibold inline-block text-red-600">
            Personas que faltan ser atendidas: {{ $porcentaje['empleados_na'] }}
          </span>
        </div>
      </div>
    </div>
    
    {{-- Cantidad de sesiones y cantidad faltantes --}}
    <div class="grid grid-cols-4 text-center md:tex-lg lg:text-xl py-4">
      <div class="md:col-start-2 col-span-3 sm:col-span-2 md:col-span-1"><strong>Sesiones realizadas</strong></div>
      <div class="md:text-center">{{$total_sesiones}}</div>
      <div class="md:col-start-2 col-span-3 sm:col-span-2 md:col-span-1"><strong>Sesiones por realizar</strong></div>
      <div class="md:text-center">{{$sesiones_faltantes}}</div>
    </div>

    <div class="card-body font-bold text-lg text-center text-center"> {{-- Label Buscar asistente --}}
      Buscar Asistente
    </div>

    <div class="row"> {{-- Buscar asistente --}}
      <div class="col-12 col-md-4 offset-md-4">
        <input type="text" id="input_asistente" class="form-control">
      </div>
      <div class="col-6 offset-3 col-md-4 offset-md-4 col-lg-2 offset-lg-5 p-3">
        <button type="button" class="btn btn-block text-light" onclick="obtenerAsistente()" style="background-color: #da2c4e;">Buscar</button>
      </div>
    </div>
    <br>
    {{-- Tabla para mostrar el resultado de la búsqueda --}}
    <div class="row">
      <div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
                <th scope="col">ID Empleado</th>
                <th scope="col">Nombre Empleado</th>
                <th scope="col" class="d-none d-md-table-cell">Ubicación</th>
                <th scope="col" class="d-none d-md-table-cell">Departamento</th>
                <th scope="col">Estatus</th>
            </tr>
          </thead>
          <tbody id="table_un_asistente">

          </tbody>
        </table>
      </div>
    </div>

    {{-- Botones para descargas --}}
    <div class="grid grid-cols-7 gap-y-5">
      <div class="col-span-7 md:col-span-3 lg:col-span-2 lg:col-start-2">
        <a href="{{ route('Administrador.inicio.excel.b') }}" class="btn btn-block text-white normal-case" style="background-color: #107c41">
          <i class="fas fa-file-excel"></i> Personal sin asistencia
        </a>
      </div>
      <div class="col-span-7 md:col-span-3 lg:col-span-2 md:col-start-5 lg:col-start-5">
        <a href="{{ route('Administrador.inicio.excel') }}" class="btn btn-block text-white normal-case" style="background-color: #107c41">
          <i class="fas fa-file-excel"></i> Personal con asistencia
        </a>
      </div>
    </div>
    <div class="col-12 col-md-8 col-lg-9 col-xl-12 py-4 d-flex justify-content-center">
      <div class="btn-group" role="group">
        <a href="#" class="btn text-white normal-case"
            data-mdb-toggle="modal" 
            data-mdb-target="#filtrosModal" 
            style="background-color: #da2c4e">
          Filtrar personal
        </a>
      </div>
    </div>

  </div>

</div>
<br><br>
{{-- Componente --}}
<x-pop-up/>

@endsection