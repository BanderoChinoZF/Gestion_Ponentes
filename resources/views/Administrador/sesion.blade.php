@extends('layouts.app')
@section('content')
  
<div class="card">
    <div class="card-header text-center">
        <div class="card-title">Sesion {{$sesion->idsesion}} </div>
        <div class="card-subtitle">Tallerista: {{$sesion->tallerista}} </div>
    </div>
    <div class="card-body">
        <div class="row">
          <div class="card-header col-lg-6" id="chart1">
              {{-- Aquí van los gráficos --}}
          </div>
          <div class="card-header col-lg-6" id="chart2">
            <table id="datatable" class="table">
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

          <div class="card-header col-lg-6">
            Comentarios <br>
            <hr>
              {{$sesion->comentario1}}
            <hr>
              {{$sesion->comentario2}}
            <hr>
              {{$sesion->comentario3}}
            <hr>
              {{$sesion->comentario4}}
            <hr>
          </div>
          <div class="card-header col-lg-6"> 
            {{$respuestas[0]->respuesta}} 
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
