<div>
    {{-- encabezado --}}
    <div class="card-header text-center font-sans text-xl font-bold">
      SESIONES
      <div class="d-flex justify-content-end">
        <input wire:model="search" type="text" class="form-control" placeholder="Ingrese la fecha">
      </div>
    </div>
    <div class="card-body">
        {{-- cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
          @foreach ($sesiones as $a)
            <div class="col">
              <div class="card h-100 p-0">
                {{-- Se coloca la imagen sin imagen por default --}}
                {{-- <img src="{{ asset('img/sin_imagen.png') }}" class="card-img-top" alt="Sesion sin imagen"> --}}
                <img src="@if ($a->ruta_imagen)
                  {{ asset($a->ruta_imagen) }}
                @else
                  {{ asset('img/sin_imagen.png') }}
                @endif" alt="" class="img-fluid rounded h-40" style="object-fit: cover;">
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
                    <label class="text-sm text-muted py-2">{{ $a->fecha }}</label>
                  </div>
                </div>
                <div class="card-footer">
                  <a href="{{ route('Administrador.sesiones.showSesion', $a->idsesion) }}" class="btn btn-block text-white normal-case rounded-pill" style="background-color: #da2c4e">
                    Detalles
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        {{-- cards --}}
    </div>
    <div class="card-footer">
        {{$sesiones->links()}}
    </div>
</div>
