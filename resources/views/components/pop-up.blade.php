<!-- Modal -->
<div class="modal fade" id="filtrosModal" tabindex="-1" role="dialog" aria-labelledby="filtrosModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
      <div class="modal-header text-center text-light text-xl font-bold" style="background-color: #da2c4e">
          <h5 class="text-center" id="filtrosModalLabel">Seleccionar los filtros deseados</h5>
          <button type="button" class="close" data-mdb-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        {{-- Buttons --}}
        <div class="grid grid-cols-3 gap-x-1 gap-y-2">
          <button class="btn bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold normal-case" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseUbicacion" aria-expanded="false" aria-controls="collapseExample">
            Ubicaci&oacute;n
          </button>
          <button class="btn bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold normal-case" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseDepartamento" aria-expanded="false" aria-controls="collapseExample">
            Departamentos
          </button>
          <button class="btn bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold normal-case" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseJefe" aria-expanded="false" aria-controls="collapseExample">
            Jefe directo
          </button>
          <button class="btn bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold normal-case" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseTipos" aria-expanded="false" aria-controls="collapseExample">
            Tipos
          </button>
          <button class="btn bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold normal-case" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapsePuestos" aria-expanded="false" aria-controls="collapseExample">
            Puestos
          </button>
          <a href="{{ route('Administrador.asistentes.index') }}" class="btn bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold normal-case">
            Sin filtros
          </a>
        </div>
        {{--Collapses --}}
        <div class="py-1 px-2">  
          <div class="collapse py-4" id="collapseUbicacion">
            <div class="overflow-y-auto h-62">
              @foreach ($ubicaciones as $item)
                @if ($item->ubicacion != null)
                <a href="{{ route('Administrador.asistentes.filtros',['ubicacion',str_replace(' ', '+', $item->ubicacion)]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">{{$item->ubicacion}}</a>  
                {{-- @else
                  <a href=" {{ route('Administrador.asistentes.filtros',['ubicacion',str_replace(' ', '+', $item->ubicacion)]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Mostrar todos</a>   --}}
                @endif
              @endforeach
            </div>
          </div>
          {{-- Filtro por departamento --}}
          <div class="collapse py-4" id="collapseDepartamento">
            <div class="overflow-y-auto h-62">
              @foreach ($departamentos as $item)
                @if ($item->departamento != null)
                  <a href=" {{ route('Administrador.asistentes.filtros',['departamento',str_replace(' ', '+', $item->departamento)]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">{{$item->departamento}}</a>  
                {{-- @else
                  <a href=" {{ route('Administrador.asistentes.filtros',['ubicacion',str_replace(' ', '+', $item->ubicacion)]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Mostrar todos</a>   --}}
                @endif
              @endforeach
            </div>
          </div>
          {{-- Filtro por jefe-inmediato --}}
          <div class="collapse py-4" id="collapseJefe">
            <div class="overflow-y-auto h-62">
              @foreach ($jefes as $item)
                @if ($item->jefe_inmediato != null)
                  <a href=" {{ route('Administrador.asistentes.filtros',['jefe_inmediato',str_replace(' ', '+', $item->jefe_inmediato)]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">{{$item->jefe_inmediato}}</a>  
                {{-- @else
                  <a href=" {{ route('Administrador.asistentes.filtros',['ubicacion',str_replace(' ', '+', $item->ubicacion)]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Mostrar todos</a>   --}}
                @endif
              @endforeach
            </div>
          </div>
          {{-- Filtro por puesto --}}
          <div class="collapse py-4" id="collapsePuestos">
            <div class="overflow-y-auto h-62">
              @foreach ($puestos as $item)
                @if ($item->puesto != null)
                  <a href=" {{ route('Administrador.asistentes.filtros',['puesto',str_replace(' ', '+', $item->puesto)]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">{{$item->puesto}}</a>  
                {{-- @else
                  <a href=" {{ route('Administrador.asistentes.filtros',['ubicacion',str_replace(' ', '+', $item->ubicacion)]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Mostrar todos</a>   --}}
                @endif
              @endforeach
            </div>
          </div>
          {{-- Filtro por tipos --}}
          <div class="collapse py-4" id="collapseTipos">
            <div class="overflow-y-auto h-62">
              @foreach ($tipos as $item)
                @if ($item->tipo != null)
                  <a href=" {{ route('Administrador.asistentes.filtros',['tipo',str_replace(' ', '+', $item->tipo)]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">{{$item->tipo}}</a>  
                {{-- @else
                  <a href=" {{ route('Administrador.asistentes.filtros',['ubicacion',str_replace(' ', '+', $item->ubicacion)]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Mostrar todos</a>   --}}
                @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cerrar</button>
          {{-- <button type="button" class="btn btn-primary">Mostrar</button> --}}
      </div>
      </div>
  </div>
</div>