<!-- Modal -->
<div class="modal fade" id="filtrosModal" tabindex="-1" role="dialog" aria-labelledby="filtrosModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="filtrosModalLabel">Seleccionar los filtros deseados</h5>
          <button type="button" class="close" data-mdb-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        
        <div class="py-2">
          <button class="btn-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseUbicacion" aria-expanded="false" aria-controls="collapseExample">
            Filtrar por ubicaci&oacute;n
          </button>
          <div class="collapse py-4" id="collapseUbicacion">
            <div class="card card-body">
              @foreach ($ubicaciones as $item)
                {{-- <form action="{{ route('Administrador.asistentes.index') }}" method="get">
                  @csrf
                  <input type="hidden" name="filtro" value="ubicacion">
                  <input type="hidden" name="valor" value="{{$item->ubicacion}}">
                  <button class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">{{$item->ubicacion}}</button>
                </form> --}}
                  <a href=" {{ route('Administrador.asistentes.filtros',['ubicacion',str_replace(' ', '+', $item->ubicacion)]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">{{$item->ubicacion}}</a>
              @endforeach
            </div>
          </div>
        </div>

        <div class="py-2">
          <button class="btn-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseDepartamento" aria-expanded="false" aria-controls="collapseExample">
            Filtrar por departamentos
          </button>
          <div class="collapse py-4" id="collapseDepartamento">
            <div class="card card-body">
              @foreach ($departamentos as $item)
                  <a href="#">{{$item->departamento}}</a>
              @endforeach
            </div>
          </div>
        </div>

        <div class="py-2">
          <button class="btn-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseJefe" aria-expanded="false" aria-controls="collapseExample">
            Filtrar por jefe directo
          </button>
          <div class="collapse py-4" id="collapseJefe">
            <div class="card card-body">
              @foreach ($jefes as $item)
                  <a href="#">{{$item->jefe_inmediato}}</a>
              @endforeach
            </div>
          </div>
        </div>



      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Mostrar</button>
      </div>
      </div>
  </div>
</div>