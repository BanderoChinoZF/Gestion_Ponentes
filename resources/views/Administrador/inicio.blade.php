@extends('layouts.app')

@section('content')

<br>
<br>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="row text-center">
                    <h5 class="text-center">Buscar Asistente</h5>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-3">
                      <input type="text" id="input_asistente" class="form-control">
                    </div>
                    <div class="col-md-3">
                      <button type="button" class="btn btn-primary" onclick="obtenerAsistente()">Buscar</button>
                    </div>
                    <div class="col-md-2">
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <table class="table">
                        <thead>
                          <tr>
                              <th scope="col">ID Empleado</th>
                              <th scope="col">Nombre Empleado</th>
                              <th scope="col">Ubicación</th>
                              <th scope="col">Departamento</th>
                              <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody id="table_un_asistente">

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="card-body">
                  <div class="row justify-content-center">
                    <!-- Pills navs -->
                    <ul class="nav nav-pills mb-3" id="ex1" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a
                          class="nav-link active"
                          id="ex1-tab-1"
                          data-mdb-toggle="pill"
                          href="#ex1-pills-1"
                          role="tab"
                          aria-controls="ex1-pills-1"
                          aria-selected="true"
                          >Empleados Asistieron</a
                        >
                      </li>
                      <li class="nav-item" role="presentation">
                        <a
                          class="nav-link"
                          id="ex1-tab-2"
                          data-mdb-toggle="pill"
                          href="#ex1-pills-2"
                          role="tab"
                          aria-controls="ex1-pills-2"
                          aria-selected="false"
                          >Empleados No Asistieron</a
                        >
                      </li>
                    </ul>
                    <!-- Pills navs -->

                    <!-- Pills content -->
                    <div class="tab-content" id="ex1-content">
                      <div
                        class="tab-pane fade show active"
                        id="ex1-pills-1"
                        role="tabpanel"
                        aria-labelledby="ex1-tab-1"
                      >
                        <table class="table table-striped table-hover" id="tabla_asistieron">

                          <thead>
                            <tr>
                              <th scope="col">ID Empleado</th>
                              <th scope="col">Nombre Empleado</th>
                              <th scope="col">Ubicación</th>
                              <th scope="col">Departamento</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody id="contenido_asistieron">
                            @foreach ($empleados_a as $a)
                              <tr>
                                  <td>{{ $a->id_empleado }}</td>
                                  <td>{{ $a->nombre_completo }}</td>
                                  <td>{{ $a->ubicacion }}</td>
                                  <td>{{ $a->departamento }}</td>
                                  <td>
                                  
                                    @if($a->idsesion != 0)
                                      <td scope="col"><span class="badge bg-success">Con Asistencia</span></td>
                                    @endif

                                  </td>
                              </tr>

                            @endforeach

                          </tbody>
                        </table>

                        {!! $empleados_a->render() !!}

                      </div>
                      <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                        <table class="table table-striped table-hover" id="tabla_no_asistieron">
                          <thead>
                            <tr>
                              <th scope="col">ID Empleado</th>
                              <th scope="col">Nombre Empleado</th>
                              <th scope="col">Ubicación</th>
                              <th scope="col">Departamento</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody id="contenido_no_asistieron">
                          @foreach ($empleados as $e)
                            <tr>
                                <td>{{ $e->id_empleado }}</td>
                                <td>{{ $e->nombre_completo }}</td>
                                <td>{{ $e->ubicacion }}</td>
                                <td>{{ $e->departamento }}</td>
                                <td>
                                
                                  @if($e->idsesion == 0)
                                    <td scope="col"><span class="badge bg-danger">Sin Asistencia</span></td>
                                  @endif

                                </td>
                            </tr>

                            @endforeach 

                          </tbody>
                        </table>

                        {!! $empleados->render() !!}

                      </div>
                    </div>
                    <!-- Pills content -->

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