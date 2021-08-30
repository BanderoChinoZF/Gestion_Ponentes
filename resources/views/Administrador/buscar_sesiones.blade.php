@extends('layouts.app')

@section('content')

{{-- Encabezado --}}
<div class="flex items-center justify-start px-8 py-8 gap-x-8">
  <div class="rounded-full h-20 w-20">
    <img src="{{ asset('img/sin_imagen.png') }}" alt=""  class="rounded-full h-20 w-20">
  </div>
  <div class="text-center text-lg lg:text-xl font-bold flex h-20 items-center justify-center">
    {{$tallerista->nombre_tallerista}} 
  </div>
</div>

<div class="container p-2 p-lg-4">
  {{-- cards --}}
  <div class="card-body">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
      @foreach ($resultados as $a)
        <div class="col">
          <div class="card h-100 p-0">
            {{-- <img src="{{ asset($a->imagen) }}" class="card-img-top" alt=""> --}}
            <img src="{{ asset('img/sin_imagen.png') }}" class="card-img-top" alt="Sesion sin imagen">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <label class="py-2"><strong>Sesi&oacute;n</strong></label>
                <label class="py-2">{{ $a->idsesion }}</label>
              </div>
              <div class="d-flex justify-content-between">
                <label class="py-2"><strong>Tallerista</strong></label>
                <label class="py-2">{{ $a->tallerista }}</label>
              </div>
              <div class="d-flex justify-content-end">
                <label class="py-2">{{ $a->fecha }}</label>
              </div>
            </div>
            <div class="card-footer">
              <a href="{{ route('Administrador.sesiones.showSesion', $a->idsesion) }}" class="btn btn-block" style="background-color: #da2c4e"> detalles</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  {{-- cards --}}
  <br><br><br>
  <div class="card-footer">
    {{$resultados->links()}}
  </div>
</div>

{{-- Gráficas --}}
<div class="row col-12">
  <div class="col-12 col-md-4 offset-md-1" id="chart1"></div>
  <div class="col-12 col-md-4 offset-md-1" id="chart2"></div>
  <div class="col-12 col-md-4 offset-md-1" id="chart3"></div>
  <div class="col-12 col-md-4 offset-md-1" id="chart4"></div>
  <div class="col-12 col-md-4 offset-md-1" id="chart5"></div>
  <div class="col-12 col-md-4 offset-md-1" id="chart6"></div>
</div>

{{-- tablas para graficar --}}
{{-- Tabla de datos con eje x => Respuestas y eje y=>Preguntas --}}
<div class="row col-11 invisible">
  <div class="col-12 col-lg-6 ">
    <div class="table-responsive">
      <table id="datatable" class="p-0">
        <thead>
            <tr>
                <th></th>
                <th><small>{{$respuestas[0]->respuesta}}</small> </th>
                <th><small>{{$respuestas[1]->respuesta}}</small> </th>
                <th><small>{{$respuestas[2]->respuesta}}</small> </th>
                <th><small>{{$respuestas[3]->respuesta}}</small> </th>
                <th><small>{{$respuestas[4]->respuesta}}</small> </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                {{-- <th>{{$preguntas[0]->nombre_pregunta}} </th> --}}
                <th><small>{{$preguntas[0]->nombre_pregunta}}</small></th>
                <td>{{$data1['resp1']}}</td>
                <td>{{$data1['resp2']}}</td>
                <td>{{$data1['resp3']}}</td>
                <td>{{$data1['resp4']}}</td>
                <td>{{$data1['resp5']}}</td>
            </tr>
        </tbody>
      </table>
    </div>
    <div class="table-responsive">
      <table id="pregunta2" class="table-sm">
        <thead>
            <tr>
                <th></th>
                <th><small>{{$respuestas[0]->respuesta}} </small></th>
                <th><small>{{$respuestas[1]->respuesta}} </small></th>
                <th><small>{{$respuestas[2]->respuesta}} </small></th>
                <th><small>{{$respuestas[3]->respuesta}} </small></th>
                <th><small>{{$respuestas[4]->respuesta}} </small></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                {{-- <th>{{$preguntas[1]->nombre_pregunta}} </th> --}}
                <th><small>{{$preguntas[1]->nombre_pregunta}}</small></th>
                <td>{{$data2['resp1']}}</td>
                <td>{{$data2['resp2']}}</td>
                <td>{{$data2['resp3']}}</td>
                <td>{{$data2['resp4']}}</td>
                <td>{{$data2['resp5']}}</td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="col-12 col-lg-6 ">
    <div class="table-responsive">
      <table id="pregunta3" class="table-sm">
        <thead>
            <tr>
                <th></th>
                <th><small>{{$respuestas[0]->respuesta}}</small></th>
                <th><small>{{$respuestas[1]->respuesta}}</small></th>
                <th><small>{{$respuestas[2]->respuesta}}</small></th>
                <th><small>{{$respuestas[3]->respuesta}}</small></th>
                <th><small>{{$respuestas[4]->respuesta}}</small></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                {{-- <th> </th> --}}
                <th><small>{{$preguntas[2]->nombre_pregunta}}</small></th>
                <td>{{$data3['resp1']}}</td>
                <td>{{$data3['resp2']}}</td>
                <td>{{$data3['resp3']}}</td>
                <td>{{$data3['resp4']}}</td>
                <td>{{$data3['resp5']}}</td>
            </tr>
        </tbody>
      </table>
    </div>
    <div class="table-responsive">
      <table id="pregunta4" class="table-sm">
        <thead>
            <tr>
                <th></th>
                <th><small>{{$respuestas[0]->respuesta}}</small></th>
                <th><small>{{$respuestas[1]->respuesta}}</small></th>
                <th><small>{{$respuestas[2]->respuesta}}</small></th>
                <th><small>{{$respuestas[3]->respuesta}}</small></th>
                <th><small>{{$respuestas[4]->respuesta}}</small></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                {{-- <th></th> --}}
                <th><small>{{$preguntas[3]->nombre_pregunta}}</small></th>
                <td>{{$data4['resp1']}}</td>
                <td>{{$data4['resp2']}}</td>
                <td>{{$data4['resp3']}}</td>
                <td>{{$data4['resp4']}}</td>
                <td>{{$data4['resp5']}}</td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="col-12 col-lg-6 ">
    <div class="table-responsive">
      <table id="total_asistentes" class="table-sm">
        <thead>
            <tr>
                <th></th>
                <th>Personas atendidas </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                {{-- <th></th> --}}
                <th>Asistentes</th>
                <td>{{ $total_asistentes }}</td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-12 col-lg-6 ">
    <div class="table-responsive">
      <table id="total_sesiones" class="table-sm">
        <thead>
            <tr>
                <th></th>
                <th>Sesiones dadas </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                {{-- <th></th> --}}
                <th>Sesiones</th>
                <td>{{ $cantidad_sesiones }}</td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>


{{-- tablas para graficar --}}
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
        text: 'Pregunta 1'
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

  Highcharts.chart('chart2', {
    data: {
        table: 'pregunta2'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Pregunta 2'
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

  Highcharts.chart('chart3', {
    data: {
        table: 'pregunta3'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Pregunta 3'
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

  Highcharts.chart('chart4', {
    data: {
        table: 'pregunta4'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Pregunta 4'
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

  Highcharts.chart('chart5', {
    data: {
        table: 'total_asistentes'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Asistentes'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Cantidad de asistentes'
        }
    },
    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
                this.point.y + ' ' + this.point.name.toLowerCase();
        }
    }
  });

  Highcharts.chart('chart6', {
    data: {
        table: 'total_sesiones'
    },
    chart: {
        type: 'column'
    },
    title: {
        text: 'Sesiones'
    },
    yAxis: {
        allowDecimals: false,
        title: {
            text: 'Cantidad de sesiones'
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
