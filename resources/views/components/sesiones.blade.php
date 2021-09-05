<div class="card h-100 p-0">
    {{-- Se coloca la imagen sin imagen por default --}}
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
            <label class="text-sm text-muted py-2">{{ $a->fecha }}</label>
        </div>
        </div>
        <div class="card-footer">
        <a href="{{ route('Administrador.sesiones.showSesion', $a->idsesion) }}" class="btn btn-block text-white normal-case" style="background-color: #da2c4e">
            Detalles
        </a>
    </div>
  </div>