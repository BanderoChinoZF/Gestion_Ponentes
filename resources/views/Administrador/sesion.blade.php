@extends('layouts.app')
@section('content')
  {{-- Encabezado --}}
  <div class="flex items-center justify-start px-8 py-8 gap-x-8">
    {{-- Botón back --}}
    <div class="rounded-full h-20 w-20 flex items-center justify-center">
      <a href="{{ url()->previous() }}" 
        class="btn rounded-full normal-case text-light" 
        style="background-color: #da2c4e;">
        <i class="far fa-arrow-alt-circle-left"></i>
      </a>
    </div>
    <div class="text-center text-lg font-bold flex h-20 items-center justify-center">Sesion {{$sesion->idsesion}} </div>
    <div class="text-center text-lg font-bold flex h-20 items-center justify-center">Tallerista: {{$sesion->tallerista}} </div>
  </div>

  <div class="card p-2 p-md-4 mb-4">
    <div class="card-body">

        {{-- Gráficas --}}
      <div class="row col-12">
        <div class="col-12 col-md-6 px-0 mx-auto" id="chart1"></div>
        <div class="col-12 col-md-6 px-0 mx-auto" id="chart2"></div>
        <div class="col-12 col-md-6 px-0 mx-auto" id="chart3"></div>
        <div class="col-12 col-md-6 px-0 mx-auto" id="chart4"></div>
        <div class="col-12 col-md-6 px-0 mx-auto" id="chart5">
          <div class="py-8 mx-auto my-8 text-center">
            <strong>Total de asistentes atendidos: </strong> <label class="font-bold text-xl"> {{$total_asistentes}}</label>
          </div>
        </div>
        {{-- <div class="col-12 col-md-6 px-0 mx-auto" id="chart6"></div> --}}
      </div>

      {{-- Tabla de asistentes --}}
      <div class="card-header col-12 mb-4">
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
          {{-- Boton de descarga del archivo excel --}}
          <div class="col-12 d-flex justify-content-end p-4">
            <div class="btn-group" role="group">
              <a href="{{ route('Administrador.asistentes.excel.download' , $sesion->idsesion)}}" class="btn text-white normal-case" style="background-color: #107c41">
                <i class="fas fa-file-excel"></i> Excel
              </a>
            </div>
          </div>
          
        </div>
      </div>

      {{-- comentarios --}}       
      <div class="bg-body row">
        <div class="card-header bg-body text-wrap rouded fw-bold">Lo mejor de la sesi&oacute;n</div>
        <div class="card-body text-wrap bg-body px-8 pt-0">
          <p>{{$sesion->comentario1}}</p>
        </div>
      </div>
      <div class="bg-body row">
        <div class="card-header bg-body text-wrap rouded fw-bold">¿Qu&eacute; &aacute;reas de oportunidad se presentaron?</div>
        <div class="card-body text-wrap bg-body px-8 pt-0">
          <p>{{$sesion->comentario2}}</p>
        </div>
      </div>
      <div class="bg-body row">
        <div class="card-header text-wrap bg-body fw-bold">¿Qu&eacute; situaciones de AHLS se expresaron?</div>
        <div class="card-body text-wrap bg-body px-8 pt-0">
          <p>{{$sesion->comentario3}}</p>
        </div>
      </div>
      <div class="bg-body row">
        <div class="card-header text-wrap bg-body fw-bold">¿Qu&eacute; elementos de la cultura organizacional resaltaron?</div>
        <div class="card-body text-wrap bg-body px-8 pt-0">
          <p>{{$sesion->comentario4}}</p>
        </div>
      </div>

    </div>
  </div>

@endsection

@section('scripts')
  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      //Grafica 1
        var data = google.visualization.arrayToDataTable([
          ['Respuesta', 'Cantidad de respuestas'],
          <?php echo $chartData1 ?>
        ]);

        var options = { 
          title: "<?php echo $chartTitle1 ?>"
        };
        var chart = new google.visualization.PieChart(document.getElementById('chart1'));
        chart.draw(data, options);

      //Grafica 2
        var data = google.visualization.arrayToDataTable([
          ['Respuesta', 'Cantidad de respuestas'],
          <?php echo $chartData2 ?>
        ]);

        var options = { title: "<?php echo $chartTitle2 ?>" };
        var chart = new google.visualization.PieChart(document.getElementById('chart2'));
        chart.draw(data, options);

      //Grafica 3
        var data = google.visualization.arrayToDataTable([
          ['Respuesta', 'Cantidad de respuestas'],
          <?php echo $chartData3 ?>
        ]);

        var options = { title: "<?php echo $chartTitle3 ?>" };
        var chart = new google.visualization.PieChart(document.getElementById('chart3'));
        chart.draw(data, options);

      //Grafica 4
        var data = google.visualization.arrayToDataTable([
          ['Respuesta', 'Cantidad de respuestas'],
          <?php echo $chartData4 ?>
        ]);

        var options = { title: "<?php echo $chartTitle4 ?>" };
        var chart = new google.visualization.PieChart(document.getElementById('chart4'));
        chart.draw(data, options);
      //Grafica 5
        // var data = google.visualization.arrayToDataTable([
        //   ['Total de asistentes', 'Cantidad'],
        //   <?php echo $cantidad_asistentes ?>
        // ]);

        // var options = {
        //   title: "Total de asistentes atendidos" ,
        //   pieSliceText: 'label',
        //   legend: 'none'
        // };
        // var chart = new google.visualization.PieChart(document.getElementById('chart5'));
        // chart.draw(data, options);
      
    }
  </script>
  
@endsection

