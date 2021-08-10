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
          <form action="{{ route('Administrador.sesion') }}" method="post">
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
        <div class="card-body">
          <div class="row justify-content-center">            
            <table class="table table-striped table-hover" id="tabla_asistieron">
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
              <tbody id="contenido_asistieron">
                @foreach ($sesiones as $a)
                  <tr >
                      <td>{{ $a->idsesion }}</td>
                      <td>{{ $a->fecha }}</td>
                      <td>{{ $a->status }}</td>
                      <td>{{ $a->num_asistentes }}</td>
                      <td>{{ $a->tiposesion }}</td>
                      <td> {{ $a->tallerista }}</td>
                      <td>
                        <a href="{{ route('Administrador.showSesion', $a->idsesion) }}" class="btn"> detalles</a>
                        {{-- <form action="{{ route('Administrador.inicio') }}" method="post">
                          <input type="hidden" name="idsesion">
                          <button type="submit" class="btn btn-small">detalles</button>
                        </form> --}}
                      </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {!! $sesiones->render() !!}
          </div>
        </div>
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
