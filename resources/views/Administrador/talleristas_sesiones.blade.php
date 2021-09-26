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

  {{-- Descripcion del tallerista --}}
  <div class="card-body text-wrap bg-body px-8 mx-auto">
    {{-- <p>{{$tallerista->descripcion}} </p> --}}
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias, voluptatibus non obcaecati enim odio praesentium fuga earum ducimus saepe sequi asperiores facere dolores nisi exercitationem, nobis dolorem dolorum, corporis dolore.</p>
  </div>
  {{--  --}}

  {{-- SESIONES --}}
  {{-- @livewire('tallerista-sesiones') --}}
  @livewire('sesiones', ['tallerista_id' => $tallerista->id])

  {{-- Gráficas --}}
  <div class="row col-12">
    <div class="col-12 col-md-6 px-0 mx-auto" id="chart1"></div>
    <div class="col-12 col-md-6 px-0 mx-auto" id="chart2"></div>
    <div class="col-12 col-md-6 px-0 mx-auto" id="chart3"></div>
    <div class="col-12 col-md-6 px-0 mx-auto" id="chart4"></div>
    <div class="col-12 col-md-6 px-0 mx-auto" id="chart5">
      <div class="card-header py-8 mx-auto my-8 text-center">
        <strong>Total de asistentes atendidos: </strong> <label class="font-bold text-xl"> {{$total_asistentes}}</label>
      </div>
    </div>
    <div class="col-12 col-md-6 px-0 mx-auto" id="chart6">
      <div class="card-header py-8 mx-auto my-8 text-center">
        <strong>Total de sesiones impartidas: </strong> <label class="font-bold text-xl"> {{$cantidad_sesiones}}</label> 
      </div>
    </div>
  </div>

  <br>

@endsection

@section('scripts')
  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
     //-------------Grafica 1-------------------//
      var data = google.visualization.arrayToDataTable([
        ['Respuesta', 'Cantidad de respuestas'],
        <?php echo $chartData1 ?>
      ]);

      var options = { 
        title: "<?php echo $chartTitle1 ?>"
      };
      var chart = new google.visualization.PieChart(document.getElementById('chart1'));
      chart.draw(data, options);

     //-------------Grafica 2
      var data = google.visualization.arrayToDataTable([
        ['Respuesta', 'Cantidad de respuestas'],
        <?php echo $chartData2 ?>
      ]);

      var options = { title: "<?php echo $chartTitle2 ?>" };
      var chart = new google.visualization.PieChart(document.getElementById('chart2'));
      chart.draw(data, options);

     //-------------Grafica 3
      var data = google.visualization.arrayToDataTable([
        ['Respuesta', 'Cantidad de respuestas'],
        <?php echo $chartData3 ?>
      ]);

      var options = { title: "<?php echo $chartTitle3 ?>" };
      var chart = new google.visualization.PieChart(document.getElementById('chart3'));
      chart.draw(data, options);

     //-------------Grafica 4
      var data = google.visualization.arrayToDataTable([
        ['Respuesta', 'Cantidad de respuestas'],
        <?php echo $chartData4 ?>
      ]);

      var options = { title: "<?php echo $chartTitle4 ?>" };
      var chart = new google.visualization.PieChart(document.getElementById('chart4'));
      chart.draw(data, options);

     //------------- Grafica 5
      // var data = google.visualization.arrayToDataTable([
      //   ['Total de asistentes', 'Cantidad'],
      //   <?php echo $asistentes ?>
      // ]);

      // var options = {
      //   title: "Total de asistentes atendidos" ,
      //   pieSliceText: 'label',
      //   legend: 'none'
      // };
      // var chart = new google.visualization.PieChart(document.getElementById('chart5'));
      // chart.draw(data, options);
     //------------- Grafica 6
      // var data = google.visualization.arrayToDataTable([
      //   ['Total sesiones', 'Cantidad'],
      //   <?php echo $cantidadSesiones ?>
      // ]);

      // var options = {
      //   title: "Total de sesiones imprtidas",
      //   pieSliceText: 'label',
      //   legend: 'none'
      // };
      // var chart = new google.visualization.PieChart(document.getElementById('chart6'));
      // chart.draw(data, options);
    }
  </script>
  
@endsection
