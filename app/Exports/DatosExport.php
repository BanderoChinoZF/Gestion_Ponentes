<?php

namespace App\Exports;

use App\Models\Datos;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DatosExport implements FromView
{
    public function view(): View
    {
        return view('Administrador.exportar-empleados', [
            'resultados' => Datos::select(
                'id_empleado',
                'nombre_completo',
                'ubicacion',
                'departamento',
                'idsesion')->orderBy('id_empleado','ASC')->get()
        ]);
    }
}
