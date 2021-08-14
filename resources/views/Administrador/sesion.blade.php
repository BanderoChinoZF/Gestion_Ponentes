@extends('layouts.app')
@section('content')
  
<div class="card p-2 p-md-4">
  <div class="card-header p-0">
    <div class="row col-10">
      <div class="col-5 col-md-3">
        <a href="{{ route('Administrador.sesiones.index')}}" 
          class="btn btn-small text-sm normal-case text-light" 
          style="background-color: #da2c4e; border-radius: 15px;">
          <i class="fas fa-caret-left"></i>
          Volver
        </a>
      </div>
      <div class="text-center text-lg font-bold col-5 col-md-3">Sesion {{$sesion->idsesion}} </div>
      <div class="text-center col-12 col-md-5 text-lg font-bold">Tallerista: {{$sesion->tallerista}} </div>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="card-header p-1 col-lg-12" id="chart1">
          {{-- Aquí van los gráficos --}}
      </div>
      <div class="card-header col-12">
        <div class="table-responsive">
          <table id="tabla_sesion_asistentes" class="table table-striped">
            <caption>Asistentes a la sesi&oacute;n</caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre </th>
                    <th>Ubicación </th>
                    <th class="d-none d-md-table-cell">Departamento </th>
                    <th class="d-none d-md-table-cell">Id sesión </th>
                </tr>
            </thead>
            <tbody>
              @foreach ($asistentes as $asistente)
                <tr>
                    <th>{{$asistente->id_empleado}} </th>
                    <td>{{$asistente->nombre_completo}}</td>
                    <td>{{$asistente->ubicacion}}</td>
                    <td class="d-none d-md-table-cell">{{$asistente->departamento}}</td>
                    <td class="d-none d-md-table-cell">{{$asistente->idsesion}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      {{-- Tabla de datos con eje x = preguntas y eje y=>respuestas --}}
      {{-- <div class="">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th></th>
                    <th>{{$preguntas[0]->nombre_pregunta}} </th>
                    <th>{{$preguntas[1]->nombre_pregunta}} </th>
                    <th>{{$preguntas[2]->nombre_pregunta}} </th>
                    <th>{{$preguntas[3]->nombre_pregunta}} </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{$respuestas[0]->respuesta}} </th>
                    <td>{{$data1->respuesta_1}}</td>
                    <td>{{$data2->respuesta_1}}</td>
                    <td>{{$data3->respuesta_1}}</td>
                    <td>{{$data4->respuesta_1}}</td>
                </tr>
                <tr>
                    <th>{{$respuestas[1]->respuesta}} </th>
                    <td>{{$data1->respuesta_2}}</td>
                    <td>{{$data2->respuesta_2}}</td>
                    <td>{{$data3->respuesta_2}}</td>
                    <td>{{$data4->respuesta_2}}</td>
                </tr>
                <tr>
                    <th>{{$respuestas[2]->respuesta}} </th>
                    <td>{{$data1->respuesta_3}}</td>
                    <td>{{$data2->respuesta_3}}</td>
                    <td>{{$data3->respuesta_3}}</td>
                    <td>{{$data4->respuesta_3}}</td>
                </tr>
                <tr>
                    <th>{{$respuestas[3]->respuesta}} </th>
                    <td>{{$data1->respuesta_4}}</td>
                    <td>{{$data2->respuesta_4}}</td>
                    <td>{{$data3->respuesta_4}}</td>
                    <td>{{$data4->respuesta_4}}</td>
                </tr>
                <tr>
                    <th>{{$respuestas[4]->respuesta}}</th>
                    <td>{{$data1->respuesta_5}}</td>
                    <td>{{$data2->respuesta_5}}</td>
                    <td>{{$data3->respuesta_5}}</td>
                    <td>{{$data4->respuesta_5}}</td>
                </tr>
            </tbody>
          </table>
        </div>
      </div> --}}

      {{-- Tabla de datos con eje x => Respuestas y eje y=>Preguntas --}}
      <div class="invisible">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th></th>
                    <th>{{$respuestas[0]->respuesta}} </th>
                    <th>{{$respuestas[1]->respuesta}} </th>
                    <th>{{$respuestas[2]->respuesta}} </th>
                    <th>{{$respuestas[3]->respuesta}} </th>
                    <th>{{$respuestas[4]->respuesta}} </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    {{-- <th>{{$preguntas[0]->nombre_pregunta}} </th> --}}
                    <th>Pregunta_1</th>
                    <td>{{$data1->respuesta_1}}</td>
                    <td>{{$data1->respuesta_2}}</td>
                    <td>{{$data1->respuesta_3}}</td>
                    <td>{{$data1->respuesta_4}}</td>
                    <td>{{$data1->respuesta_5}}</td>
                </tr>
                <tr>
                    {{-- <th>{{$preguntas[1]->nombre_pregunta}} </th> --}}
                    <th>Pregunta_2</th>
                    <td>{{$data2->respuesta_1}}</td>
                    <td>{{$data2->respuesta_2}}</td>
                    <td>{{$data2->respuesta_3}}</td>
                    <td>{{$data2->respuesta_4}}</td>
                    <td>{{$data2->respuesta_5}}</td>
                </tr>
                <tr>
                    {{-- <th>{{$preguntas[2]->nombre_pregunta}} </th> --}}
                    <th>Pregunta_3</th>
                    <td>{{$data3->respuesta_1}}</td>
                    <td>{{$data3->respuesta_2}}</td>
                    <td>{{$data3->respuesta_3}}</td>
                    <td>{{$data3->respuesta_4}}</td>
                    <td>{{$data3->respuesta_5}}</td>
                </tr>
                <tr>
                    {{-- <th>{{$preguntas[3]->nombre_pregunta}} </th> --}}
                    <th>Pregunta_4</th>
                    <td>{{$data4->respuesta_1}}</td>
                    <td>{{$data4->respuesta_2}}</td>
                    <td>{{$data4->respuesta_3}}</td>
                    <td>{{$data4->respuesta_4}}</td>
                    <td>{{$data4->respuesta_5}}</td>
                </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="card-header">
        Comentarios
        <div>{{$sesion->comentario1}}</div>
        <div>{{$sesion->comentario2}}</div>
        <div>{{$sesion->comentario3}}</div>
        <div>{{$sesion->comentario4}}</div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
  
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
  Highcharts.chart('chart1', {
    data: {
        table: 'datatable'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Datos del cuestionario'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Cantidad de respuestas'
        }
    },
    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
                this.point.y + ' ' + this.point.name.toLowerCase();
        }
    }
  });
</script>
@endsection
