@extends('layouts.app')
@section('content')
  
<div class="card p-1 p-md-4">
  <div class="card-header p-0">
    <div >
      <a href="{{ route('Administrador.sesiones.index')}}" class="btn"> GO BACK</a>
    </div>
    <div class="text-center">Sesion {{$sesion->idsesion}} </div>
    <div class="text-center">Tallerista: {{$sesion->tallerista}} </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="card-header p-0 col-lg-6" id="chart1">
          {{-- Aquí van los gráficos --}}
      </div>
      <div class="card-header col-lg-6">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped">
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
