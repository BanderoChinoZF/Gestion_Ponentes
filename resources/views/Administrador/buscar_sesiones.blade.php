@extends('layouts.app')

@section('content')

<div class="container p-2 p-lg-4">
  <div class="card-header p-0">
    <div class="row col-10">
      <div class="col-5 col-md-3 col-lg-2">
        <a href="{{ route('Administrador.sesiones.index')}}" 
          class="btn btn-small text-sm normal-case text-light" 
          style="background-color: #da2c4e; border-radius: 15px;">
          <i class="fas fa-caret-left"></i>
          Volver
        </a>
      </div>
    </div>
    <div class="text-center text-lg font-bold col-12 col-md-6 col-lg-8">Sesiones de el(la) tallerista {{$tallerista->nombre_tallerista}} </div>
    {{-- <div class="text-center col-12 col-sm-6 text-lg font-bold">Tallerista: {{$sesion->tallerista}} </div> --}}
  </div>
  <div class="card-body">
    {{-- cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
      @foreach ($resultados as $a)
        <div class="col">
          <div class="card h-100 p-0">
            {{-- <img src="{{ $a->imagen }}" class="card-img-top" alt=""> --}}
            <img src="{{ asset('img/sin_imagen.png') }}" class="card-img-top" alt="Sesion sin imagen">
            <div class="card-body">
              <h5 class="card-title"><strong>Sesi&oacute;n</strong> {{ $a->idsesion }}</h5>
              <strong>Tallerista</strong> {{ $a->tallerista }}
              <small class="text-muted">{{ $a->fecha }}</small>
            </div>
            <div class="card-footer">
              <a href="{{ route('Administrador.sesiones.showSesion', $a->idsesion) }}" class="btn btn-block" style="background-color: #da2c4e"> detalles</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    {{-- cards --}}
  </div>
  <br><br><br>
  <div class="card-footer">
    {{$resultados->links()}}
  </div>
    {{-- <div class="card p-1">
    </div> --}}
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
<div class="row col-11">
  <div class="col-12 col-lg-6 invisible">
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
                <th>{{$preguntas[0]->nombre_pregunta}}</th>
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
      <table id="pregunta2" class="table table-striped table-sm">
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
                {{-- <th>{{$preguntas[1]->nombre_pregunta}} </th> --}}
                <th>{{$preguntas[1]->nombre_pregunta}}</th>
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

  <div class="col-12 col-lg-6 invisible">
    <div class="table-responsive">
      <table id="pregunta3" class="table table-striped table-sm">
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
                {{-- <th> </th> --}}
                <th>{{$preguntas[2]->nombre_pregunta}}</th>
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
      <table id="pregunta4" class="table table-striped table-sm">
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
                {{-- <th></th> --}}
                <th>{{$preguntas[3]->nombre_pregunta}}</th>
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

  <div class="col-12 col-lg-6 invisible">
    <div class="table-responsive">
      <table id="total_asistentes" class="table table-striped table-sm">
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
  <div class="col-12 col-lg-6 invisible">
    <div class="table-responsive">
      <table id="total_sesiones" class="table table-striped table-sm">
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
