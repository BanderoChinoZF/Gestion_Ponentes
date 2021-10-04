@extends('layouts.app')

@section('headers')
  {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">  --}}
@endsection

@section('content')

<div class="container  gy-8">
  <div class="row justify-content-center">

    <div class="row my-8">
      <div class="col-3 col-sm-2 col-xl-2 text-lg sm:text-xl md:text-2xl lg:text-4xl py-2">
        <p class="my-auto text-danger font-bold text-center">{{$porcentaje['porcentaje_a']}}% </p>
      </div>
      <div class="col">
        <div class="overflow-hidden h-4 mb-0 text-xs flex bg-red-200" style="height: 60px; border-radius: 0px">
          <div style="width:{{ $porcentaje['porcentaje_a'] }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-red-500"></div>
        </div>
        <div class="flex mb-4 mt-0 items-center justify-between">
          <div>
            <span class="text-xs font-semibold inline-block text-red-600">
              Personas atendidas: {{ $porcentaje['empleados_a'] }}
            </span>
          </div>
          <div class="text-right">
            <span class="text-xs font-semibold inline-block text-red-600">
              Faltan: {{ $porcentaje['empleados_na'] }}
            </span>
          </div>
        </div>
      </div>
    </div>

    <hr>
    <div class="relative pt-1"> {{-- Barra de porcentaje --}}
      <div class="flex mb-2 items-center justify-between">
        <div>
          <span class="text-xs md:tex-lg lg:text-xl font-semibold inline-block py-1 px-2 rounded-full text-blue-600">
            {{$porcentaje_sind['porcentaje_a']}}% de los empleados sindicalizados atendidos
          </span>
        </div>
        <div class="text-right">
          <span class="text-xs font-semibold inline-block text-blue-600">
            Personas atendidas: {{ $porcentaje_sind['empleados_a'] }}
          </span>
        </div>
      </div>
      <div class="overflow-hidden h-4 mb-0 text-xs flex rounded bg-blue-200">
        <div style="width:{{ $porcentaje_sind['porcentaje_a'] }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
      </div>
      <div class="flex mb-4 items-center justify-between">
        <div>
          {{-- Necesario para que el el siguiente div sea alineado a la derecha --}}
        </div>
        <div class="text-right">
          <span class="text-xs font-semibold inline-block text-blue-600">
            Personas que faltan ser atendidas: {{ $porcentaje_sind['empleados_na'] }}
          </span>
        </div>
      </div>
    </div>
    <hr>
    <div class="relative pt-1"> {{-- Barra de porcentaje --}}
      <div class="flex mb-2 items-center justify-between">
        <div>
          <span class="text-xs md:tex-lg lg:text-xl font-semibold inline-block py-1 px-2 rounded-full text-green-600">
            {{$porcentaje_emp['porcentaje_a']}}% de los empleados atendidos
          </span>
        </div>
        <div class="text-right">
          <span class="text-xs font-semibold inline-block text-green-600">
            Empleados atendidos: {{ $porcentaje_emp['empleados_a'] }}
          </span>
        </div>
      </div>
      <div class="overflow-hidden h-4 mb-0 text-xs flex rounded bg-green-200">
        <div style="width:{{ $porcentaje_emp['porcentaje_a'] }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
      </div>
      <div class="flex mb-4 items-center justify-between">
        <div>
          {{-- Necesario para que el el siguiente div sea alineado a la derecha --}}
        </div>
        <div class="text-right">
          <span class="text-xs font-semibold inline-block text-green-600">
            Empleados que faltan ser atendidos: {{ $porcentaje_emp['empleados_na'] }}
          </span>
        </div>
      </div>
    </div>
    <hr>
    {{-- Cantidad de sesiones y cantidad faltantes --}}
    <div class="grid grid-cols-4 text-center md:tex-lg lg:text-xl py-4 mx-auto">
      <div class="md:col-start-2 col-span-3 sm:col-span-2 md:col-span-1"><strong>Sesiones realizadas</strong></div>
      <div class="md:text-center">{{$total_sesiones}}</div>
      <div class="md:col-start-2 col-span-3 sm:col-span-2 md:col-span-1"><strong>Sesiones por realizar</strong></div>
      <div class="md:text-center">{{$sesiones_faltantes}}</div>
    </div>
    {{-- Labels para las gráficas --}}
    <div class="row p-0 m-0">
      {{-- <label class="text-center col-4 col-md-3 col-lg mb-2">
        <button class=" btn btn-sm btn-primary" style="height: 26px; width: 26px; border-radius: 0px">
        </button>
        <small class="">Muy de acuerdo</small>
      </label>
      <label class="text-center col-4 col-md-3 col-lg mb-2">
        <button class=" btn btn-sm btn-success" style="height: 26px; width: 26px; border-radius: 0px">
        </button>
        <small class="">De acuerdo</small>
      </label> --}}
      <label class="text-center col-4 col-md-3 col-lg mb-2">
        <button class=" btn btn-sm btn-info" style="height: 26px; width: 26px; border-radius: 0px">
        </button>
        <small class="">Muy de acuerdo</small>
      </label>
      <label class="text-center col-4 col-md-3 col-lg mb-2">
        <button class=" btn btn-sm btn-warning" style="height: 26px; width: 26px; border-radius: 0px">
        </button>
        <small class="">Más o menos</small>
      </label>
      <label class="text-center col-4 col-md-3 col-lg mb-2">
        <button class=" btn btn-sm btn-danger" style="height: 26px; width: 26px; border-radius: 0px">
        </button>
        <small class="">Desacuerdo</small>
      </label>
    </div>
    {{--  --}}
    <div class="m-4 p-2">
      <p class="font-xl font-semibold text-center">Cuestionario a personal sindicalizado</p>
      <x-progress-bar titulo="¿Consideras que los objetivos del taller se cumplierón?" r1="{{$p1['pr1']}}" r2="{{$p1['pr2']}}" r3="{{$p1['pr3']}}" r4="{{$p1['pr4']}}" r5="{{$p1['pr5']}}"></x-progress-bar>
      <x-progress-bar titulo="¿Cómo calificarias la información recibida durante el taller?" r1="{{$p2['pr1']}}" r2="{{$p2['pr2']}}" r3="{{$p2['pr3']}}" r4="{{$p2['pr4']}}" r5="{{$p2['pr5']}}"></x-progress-bar>
      <x-progress-bar titulo="¿Cómo calificarias las dinámicas que se realizaron durante el taller?" r1="{{$p3['pr1']}}" r2="{{$p3['pr2']}}" r3="{{$p3['pr3']}}" r4="{{$p3['pr4']}}" r5="{{$p3['pr5']}}"></x-progress-bar>
      <x-progress-bar titulo="¿Cúal es tu opinión del protocolo?" r1="{{$p4['pr1']}}" r2="{{$p4['pr2']}}" r3="{{$p4['pr3']}}" r4="{{$p4['pr4']}}" r5="{{$p4['pr5']}}"></x-progress-bar>
    </div>

    <div class="m-4 p-2">
      <p class="font-xl font-semibold text-center">Cuestionario a personal empleados</p>
      <x-progress-bar titulo="¿Consideras que los objetivos del taller se cumplierón?" r1="{{$ep1['pr1']}}" r2="{{$ep1['pr2']}}" r3="{{$ep1['pr3']}}" r4="{{$ep1['pr4']}}" r5="{{$ep1['pr5']}}"></x-progress-bar>
      <x-progress-bar titulo="¿Cómo calificarias la información recibida durante el taller?" r1="{{$ep2['pr1']}}" r2="{{$ep2['pr2']}}" r3="{{$ep2['pr3']}}" r4="{{$ep2['pr4']}}" r5="{{$ep2['pr5']}}"></x-progress-bar>
      <x-progress-bar titulo="¿Cómo calificarias las dinámicas que se realizaron durante el taller?" r1="{{$ep3['pr1']}}" r2="{{$ep3['pr2']}}" r3="{{$ep3['pr3']}}" r4="{{$ep3['pr4']}}" r5="{{$ep3['pr5']}}"></x-progress-bar>
      <x-progress-bar titulo="¿Cúal es tu opinión del protocolo?" r1="{{$ep4['pr1']}}" r2="{{$ep4['pr2']}}" r3="{{$ep4['pr3']}}" r4="{{$ep4['pr4']}}" r5="{{$ep4['pr5']}}"></x-progress-bar>
    </div>
    
    {{--  --}}
    @livewire('empleados')
    {{--  --}}
    @livewire('salones')
    {{--  --}}
    
    <div class="card-body font-bold text-lg text-center text-center"> {{-- Label Buscar asistente --}}
      Buscar Asistente
    </div>

    <div class="row"> {{-- Buscar asistente --}}
      <div class="col-12 col-md-4 offset-md-4">
        <input type="text" id="input_asistente" class="form-control">
      </div>
      <div class="col-6 offset-3 col-md-4 offset-md-4 col-lg-2 offset-lg-5 p-3">
        <button type="button" class="btn btn-block text-light rounded-pill" onclick="obtenerAsistente()" style="background-color: #da2c4e;">Buscar</button>
      </div>
    </div>
    <br>
    {{-- Tabla para mostrar el resultado de la búsqueda --}}
    <div class="row">
      <div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
                <th scope="col" class="d-none d-md-table-cell">ID Empleado</th>
                <th scope="col">Nombre Empleado</th>
                <th scope="col" class="d-none d-md-table-cell">Ubicación</th>
                <th scope="col" class="d-none d-md-table-cell">Departamento</th>
                <th scope="col">Asistencia</th>
                <th scope="col" class="d-none d-md-table-cell">Estatus</th>
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
      <a href="#" class="btn text-white normal-case rounded-pill"
          data-mdb-toggle="modal" 
          data-mdb-target="#filtrosModal" 
          style="background-color: #da2c4e">
        Filtrar personal
      </a>

      {{-- <a href="{{route('Administrador.fakeData')}}" class="btn text-white normal-case rounded-pill"
          style="background-color: #da2c4e">
        Fake data
      </a> --}}
    </div>

  </div>

</div>
<br><br>
{{-- Componente --}}
<x-pop-up/>

@endsection