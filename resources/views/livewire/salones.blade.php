<div>
    <div class="card">
        <div class="card-header text-center font-sans text-xl font-bold">
            <div class="d-flex justify-content-end">
                <input wire:model="search" type="text" class="form-control" placeholder="Salón">
                <label class="mx-8 my-auto"> <i class="fas fa-search"></i> </label>
            </div>
            <select wire:model="tallerista" name="talleristas" class="custom-select p-1 rounded my-2 shadow font-sm ">
                <option class="mx-2 font-serif capitalize" value="">Seleccionar Tallerista</option>
                @foreach ($talleristas as $t)
                    <option class="mx-2 font-serif capitalize" value="{{$t->id}}">{{$t->nombre_tallerista}}</option>
                @endforeach
            </select>
        </div>
        @if ($assistants->count())
            <div class="car-body overflow-auto">
                <table class="table table-bordered table-hover">
                    <thead class="bg-red-600 text-white font-bold">
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
        @else
            <div class="card-header text-center font-sans text-xl font-bold">
                <label></label>
            </div>
        @endif
    </div>
    <div class="card-header mx-auto">
        {{$assistants->links()}}
    </div>

</div>
