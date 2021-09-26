<div class="row mx-auto my-4">
    
    <div class="col-12">
        <nav class="navbar navbar-light font-bold bg-transparent">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarToggle" 
            aria-controls="navbarToggle"  aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> <strong>Filtros</strong>
        </button>
        <label class="mx-4">Empleados</label>
        </nav>
        <div class="collapse" id="navbarToggle">
            <div class="form-group m-md-4">
                <label for="fecha" class="">Fecha</label>
                <input wire:model="fecha" type="text" name="fecha" class="form-control">
            </div>
            <div class="form-group m-md-4">
                <label for="salon">Salon</label>
                <input wire:model="salon" type="text" name="salon" class="form-control">
            </div>

            <div class="input-group my-4 mx-auto">
                <select wire:model="horario" name="horario" class="custom-select p-2 bg-gray-200 rounded-lg w-100">
                    <option value="" disabled>Horario</option>
                    <option value="7:00-11:00">7:00-11:00</option>
                    <option value="7:00-13:00">7:00-13:00</option>
                    <option value="15:00-19:00">15:00-19:00</option>
                    <option value="otro">Otro</option>
                </select>
            </div>

            <div class="form-grop m-4">
                <div class="input-group mb-2">
                    <label>
                        <input wire:model="tipo" type="radio" value="empleado" name="tipo" id="e">
                        Empleado
                    </label>
                </div>
                <div class="input-group">
                    <label>
                        <input wire:model="tipo" type="radio" value="sindicalizado" name="tipo" id="s">
                        Sindicalizado
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div class="col overflow-auto h-100" style="max-height: 450px">
        <table class="table table-hover table-bordered table-striped">
            <thead class="bg-danger font-bold text-white">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Sesion</th>
                    <th class="hidden md:table-cell">Fecha</th>
                    <th class="hidden md:table-cell">Salon</th>
                    <th class="hidden md:table-cell">Tipo de Sesion</th>
                    <th class="hidden md:table-cell">Horario</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                    <tr class="capitalize">
                        <td>{{$empleado->id_empleado}}</td>
                        <td>{{$empleado->nombre_completo}}</td>
                        <td>{{$empleado->idsesion}}</td>
                        <td class="hidden md:table-cell">{{$empleado->fecha}}</td>
                        <td class="hidden md:table-cell">{{$empleado->salon}}</td>
                        <td class="hidden md:table-cell">{{$empleado->tiposesion}}</td>
                        <td class="hidden md:table-cell">{{$empleado->horario}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
