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
            Sucursal
          </button>
          <button class="btn bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold normal-case" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseDepartamento" aria-expanded="false" aria-controls="collapseExample">
            &Aacute;reas
          </button>
          <button class="btn bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold normal-case" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapsePuestos" aria-expanded="false" aria-controls="collapseExample">
            Puestos
          </button>
          {{-- <a href="{{ route('Administrador.asistentes.index') }}" class="btn bg-blue-500 hover:bg-blue-700 text-sm text-white font-bold normal-case">
            Sin filtros
          </a> --}}
        </div>
        {{--Collapses --}}
        <div class="py-1 px-2"> 
           {{-- Filtro por sucursal --}}
          <div class="collapse py-4" id="collapseUbicacion">
            <div class="overflow-y-auto h-62">
              <a href="{{ route('Administrador.asistentes.filtros',['sucursal',str_replace(' ', '+', 'semanal mina')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Semanal mina</a>
              <a href="{{ route('Administrador.asistentes.filtros',['sucursal',str_replace(' ', '+', 'semanal contraloría')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Semanal contraloría</a>
              <a href="{{ route('Administrador.asistentes.filtros',['sucursal',str_replace(' ', '+', 'semanal contraloría event')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Semanal contraloría event</a>
              <a href="{{ route('Administrador.asistentes.filtros',['sucursal',str_replace(' ', '+', 'semanal distribuibles min')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Semanal distribuibles min</a>
              <a href="{{ route('Administrador.asistentes.filtros',['sucursal',str_replace(' ', '+', 'semanal planta concentrad')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Semanal planta concentrad</a>
              <a href="{{ route('Administrador.asistentes.filtros',['sucursal',str_replace(' ', '+', 'semanal soporte a la oper')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Semanal soporte a la oper</a>
            </div>
          </div>
          {{-- Filtro por área --}}
          <div class="collapse py-4" id="collapseDepartamento">
            <div class="overflow-y-auto h-62">
              <a href=" {{ route('Administrador.asistentes.filtros',['area',str_replace(' ', '+', 'Contraloría')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Contraloría</a>
              <a href=" {{ route('Administrador.asistentes.filtros',['area',str_replace(' ', '+', 'Geología')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Geología</a>
              <a href=" {{ route('Administrador.asistentes.filtros',['area',str_replace(' ', '+', 'Mantenimiento')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Mantenimiento</a>
              <a href=" {{ route('Administrador.asistentes.filtros',['area',str_replace(' ', '+', 'Mina')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Mina</a>
              <a href=" {{ route('Administrador.asistentes.filtros',['area',str_replace(' ', '+', 'Planeación')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Planeación</a>
              <a href=" {{ route('Administrador.asistentes.filtros',['area',str_replace(' ', '+', 'Planta de beneficio')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Planta de beneficio</a>
              <a href=" {{ route('Administrador.asistentes.filtros',['area',str_replace(' ', '+', 'Seguridad')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Seguridad</a>
              <a href=" {{ route('Administrador.asistentes.filtros',['area',str_replace(' ', '+', 'Sistemas')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Sistemas</a>
            </div>
          </div>
          {{-- Filtro por puesto --}}
          <div class="collapse py-4" id="collapsePuestos">
            <div class="overflow-y-auto h-62">
              <a href=" {{ route('Administrador.asistentes.filtros',['puesto',str_replace(' ', '+', 'Operador A')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Operador a</a>  
              <a href=" {{ route('Administrador.asistentes.filtros',['puesto',str_replace(' ', '+', 'Operador B')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Operador b</a>  
              <a href=" {{ route('Administrador.asistentes.filtros',['puesto',str_replace(' ', '+', 'Misceláneo')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Miscel&aacute;neo</a>
              <a href=" {{ route('Administrador.asistentes.filtros',['puesto',str_replace(' ', '+', 'Obrero general')]) }} " class="btn-block bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-700 py-2 px-4 border border-blue-500 hover:border-transparent rounded">Obrero general</a>  
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