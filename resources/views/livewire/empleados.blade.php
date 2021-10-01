<div class="row mx-auto my-4">
    
    <div class="col-12">
        <nav class="navbar navbar-light font-bold bg-transparent">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarToggle" 
            aria-controls="navbarToggle"  aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> <strong>Filtros</strong>
        </button>
        <button wire:click="buscarTodos()" class="btn btn-danger">Buscar todos</button>
        {{-- <label class="mx-4">Empleados</label> --}}
        </nav>
        <div class="collapse" id="navbarToggle">
            <div class="row">

                <div class="form-group m-md-4 col-12 col-md-5">
                    <label for="fecha" class="">Fecha</label>
                    <input wire:model.defer="fecha" type="text" name="fecha" class="form-control">
                </div>
    
                <div class="form-group m-md-4 col-12 col-md-5">
                    <label for="salon">Salon</label>
                    <input wire:model.defer="salon" type="text" name="salon" class="form-control">
                </div>

                <div class="input-group my-4 col-12 col-md-4">
                    <select wire:model.defer="horario" name="horario" class="custom-select mx-auto col-4 p-2 bg-gray-100 rounded-lg">
                        <option value="" disabled>Horario</option>
                        <option value="7:00-11:00">7:00-11:00</option>
                        <option value="7:00-13:00">7:00-13:00</option>
                        <option value="15:00-19:00">15:00-19:00</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
    
                <div class="form-grop m-4 col-12">
                    <div class="row">
                        <label class="form-control bg-light col">
                            <input wire:model.defer="tipo" type="radio" value="empleado" name="tipo" id="e">
                            Empleado
                        </label>
                        <label class="form-control bg-light col">
                            <input wire:model.defer="tipo" type="radio" value="sindicalizado" name="tipo" id="s">
                            Sindicalizado
                        </label>
                    </div>
                    <div class="input-group">
                    </div>
                </div>
                
            </div>

            <button wire:click="search" class="mx-auto btn btn-success">
                <label class="mx-8 my-auto"> <i class="fas fa-search"></i> Aplicar filtros</label>
            </button>

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
