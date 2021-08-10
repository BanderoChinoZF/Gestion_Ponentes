@extends('layouts.app')

@section('content')

<br>
<br>


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <br>
          <form action="{{ route('Administrador.sesiones.sesion') }}" method="post">
            @csrf
            <div class="row">
              <div class="col-md-4">
              </div>
              <div class="col-md-3">
                <input type="text" class="form-control" placeholder="clave de sesion" name="idsesion" required>
              </div>
              <div class="col-md-3">
                <button class="btn btn-primary" type="submit" id="buscarButton"> Buscar Sesion </button>
              </div>
              <div class="col-md-2">
              </div>
            </div>
          </form>
          @if ($sesion)
            <div class="row">
              <div class="col-md-12">
                @foreach ($sesion as $a)
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">ID Sesion</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Núm. asistentes</th>
                        <th scope="col">Tipo de sesion</th>
                        <th scope="col">Tallerista</th>
                      </tr>
                    </thead>
                    <tbody id="tabla_sesion">      
                      <tr>
                          <td>{{ $a->idsesion }}</td>
                          <td>{{ $a->fecha }}</td>
                          <td>{{ $a->status }}</td>
                          <td>{{ $a->num_asistentes }}</td>
                          <td>{{ $a->tiposesion }}</td>
                          <td> {{ $a->tallerista }}</td>
                      </tr>
                    </tbody>
                  </table>
                @endforeach
              </div>
            </div>
          @endif
          <br>
        </div>

        {{-- cards --}}
        <div class="row row-cols-1 row-cols-md-3 g-4">
          @foreach ($sesiones as $a)
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
        {!! $sesiones->render() !!}
        {{-- cards --}}

      </div>
    </div>
  </div>
</div>



  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

@endsection
