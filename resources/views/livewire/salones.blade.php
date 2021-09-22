<div>
    <div class="card">
        <div class="card-header text-center font-sans text-xl font-bold">
            Salones
            <div class="d-flex justify-content-end">
              <input wire:model="search" type="text" class="form-control" placeholder="Salón">
            </div>
          </div>
        <table class="table">
            <thead class="">
                <tr>
                    <th>Sesi&oacute;n</th>
                    <th>Sal&oacute;n</th>
                    <th>Tallerista</th>
                    <th>Fecha</th>
                    <th>Asistentes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assistants as $assistant)
                    <tr>
                        <td>{{$assistant->idsesion}}</td>
                        <td>{{$assistant->salon}}</td>
                        <td>
                            @if ($assistant->tallerista)
                                {{$assistant->tallerista->nombre_tallerista }}
                            @else
                                Sin Tallerista
                            @endif
                        </td>
                        <td>{{$assistant->fecha}}</td>
                        <td>{{$assistant->num_asistentes}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card">
        {{$assistants->links()}}
    </div>

</div>
