@extends('layouts.app')

@section('content')

<div class="col col-md-10 offset-md-1 py-4">

    <div class="py-4 text-center md:text-xl font-bold uppercase">{{$empleado->nombre_completo}}</div>

    <div class="grid grid-cols-7 gap-x-4">
        <img class="col-span-5 col-start-2 sm:col-span-3 md:col-span-2 card-img-top " src="{{ asset('img/sin_imagen.png')}}" alt="Card image cap">
        <div class="col-span-7 sm:col-span-4 md:col-span-5">
            <table class="table">
                <tbody class="capitalize text-lg">
                    <tr>
                        <td class="font-bold uppercase">ID</td>
                        <td>{{$empleado->id_empleado}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold uppercase">UBICACI&Oacute;N</td>
                        <td>{{$empleado->ubicacion}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold uppercase">Departamento</td>
                        <td>{{$empleado->departamento}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold uppercase">Jefe inmediato</td>
                        <td>{{$empleado->jefe_inmediato}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold uppercase">Tipo</td>
                        <td>{{$empleado->tipo}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold uppercase">Puesto</td>
                        <td>{{$empleado->puesto}}</td>
                    </tr>
                    <tr>
                        <td class="font-bold uppercase">Sesi&oacute;n</td>
                        @if ( $empleado->idsesion == '0')
                            <td>Sin sesi&oacute;n</td>
                        @else
                            <td>{{$empleado->idsesion}}</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection
