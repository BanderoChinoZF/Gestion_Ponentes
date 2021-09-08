@extends('layouts.app')

@section('content')

{{-- Talleristas --}}
<div class="col-10 offset-1 mb-8">
    <div class="py-8 text-center text-xl font-bold uppercase">Talleristas</div>
    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4">
        @foreach ($talleristas as $tallerista)
            <div class="card h-100">
                <img class="img-fluid rounded-start" src="{{ asset('img/sin_imagen.png')}}" alt="Card image cap">
                <div class="card-body">
                    <div class="capitalize text-center">
                        <strong> {{$tallerista->nombre_tallerista}} </strong>
                    </div>
                    <div class="capitalize text-center py-3">
                        {{$tallerista->lugar}}
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{route('Administrador.sesiones.buscar',$tallerista->id)}}" 
                        class="btn btn-block normal-case text-white rounded-pill" style="background-color: #da2c4e;">
                        <i class="fas fa-folder-open"> Detalles</i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
