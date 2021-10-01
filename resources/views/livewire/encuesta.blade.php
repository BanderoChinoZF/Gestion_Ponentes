<div>
    <div class="overflow-auto" style="max-height: 400px">
        <table class="table">
            <thead>
              <tr>
                {{-- <th>Respuesta</th> --}}
                {{-- <th>Respuesta</th> --}}
                {{-- <th>Respuesta</th> --}}
                {{-- <th>Respuesta</th> --}}
                <th>Respuesta</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($encuestas as $registro)
                <tr>
                  {{-- <td>{{$registro->respuesta1}}</td> --}}
                  {{-- <td>{{$registro->respuesta2}}</td> --}}
                  {{-- <td>{{$registro->respuesta3}}</td> --}}
                  {{-- <td>{{$registro->respuesta4}}</td> --}}
                  <td>{{$registro->respuesta5}}</td>
                  {{-- <td>{{$registro->idsesiones}}</td> --}}
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-header">
        <button wire:click="mas()" class="btn btn-primary">
            @if ($showAll)
                Ver menos
            @else
                Ver m&aacute;s
            @endif
        </button>
    </div>
</div>
