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
              <th class="d-none d-md-table-cell">Jefe inmediato</th>
              <th class="d-none d-md-table-cell">Puesto</th>
              <th class="d-none d-md-table-cell">Tipo</th>
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
              <td class="d-none d-md-table-cell">{{$asistente->jefe_inmediato}}</td>
              <td class="d-none d-md-table-cell">{{$asistente->puesto}}</td>
              <td class="d-none d-md-table-cell">{{$asistente->tipo}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>