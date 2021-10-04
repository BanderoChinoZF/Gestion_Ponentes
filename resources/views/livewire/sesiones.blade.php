<div>
    {{-- encabezado --}}
    <div class="text-center font-sans text-xl font-bold">
      <label class="mb-6">SESIONES</label>
      <h6><small>Buscar por rango de fechas</small></h6>
      <div class="d-flex justify-content-end my-2">
        <label class="mx-2">De</label>
        <input wire:model="initialdate" type="text" class="form-control mx-1" placeholder="2020/12/31">
        <label class="mx-2">A</label>
        <input wire:model="finaldate" type="text" class="form-control mx-1" placeholder="Fecha final">
      </div>
    </div>
    <div class="card-body">
        {{-- cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
          @foreach ($sesiones as $a)
            <div class="col">
              <div class="card h-100 p-0">
                <img src="@if ($a->ruta_imagen)
                  {{ asset($a->ruta_imagen) }}
                @else
                  {{ asset('img/sin_imagen.png') }}
                @endif" alt="" class="img-fluid rounded h-40" style="object-fit: cover;">
                <div class="card-body">
                  <div class="d-flex justify-content-start">
                    <label class="py-2"><strong>Sesi&oacute;n </strong> </label>
                    <label class="py-2">: {{ $a->idsesion }}</label>
                  </div>
                  <div class="d-flex justify-content-between">
                    <label class="py-2"><strong>Tallerista</strong></label>
                    <label class="py-2">
                      @if ($a->tallerista)
                        {{ $a->tallerista->nombre_tallerista }}
                      @else
                          Sin Tallerista
                      @endif
                    </label>
                  </div>
                  
                  <div class="d-flex justify-content-end">
                    <label class="text-sm py-2">
                      <small>{{ $a->fecha }}</small>
                      <br>
                      <small>{{ $a->horario }}</small>
                    </label>
                  </div>
                </div>
                <div class="card-footer">
                  <a href="{{ route('Administrador.sesiones.showSesion', $a->idsesion) }}" class="btn btn-block text-white normal-case rounded-pill" style="background-color: #da2c4e">
                    Ver m&aacute;s
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
