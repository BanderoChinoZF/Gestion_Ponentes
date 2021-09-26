@extends('layouts.app')

@section('content')

@if ($filtro != null)
    <div class="py-8 text-center text-xl font-bold uppercase">{{$filtro}} {{$valor}}</div>
@else
    <div class="py-8 text-center text-xl font-bold uppercase">Empleados</div>
@endif

<div class="col-10 offset-1">
    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
        @foreach ($empleados as $empleado)
            <div class="card h-100">
                <img class="img-fluid rounded-start" src="{{ asset('img/sin_imagen.png')}}" alt="Card image cap">
                <div class="card-body">
                    <div class="capitalize">
                        {{$empleado->nombre_completo}}
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('Administrador.asistentes.show', $empleado->id_empleado)}}" 
                        class="btn btn-block normal-case rounded-pill bg-blue-600 hover:bg-red-600 text-white">
                        <i class="fas fa-folder-open"> Detalles</i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="py-4 my-8 px-auto mx-auto overflow-auto text-center">
    {{ $empleados->onEachSide(1)->links()}}
</div>
<hr>
<br>
@endsection
