<?php

namespace App\Exports;

use App\Models\Datos;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DatosExport implements FromView
{
    public function condicion(string $campo, string $condicion, string $valor){
        $this->campo = $campo;
        $this->condicion = $condicion;
        $this->valor = $valor;
        return $this;
    }

    public function view(): View
    {
        return view('Administrador.exportar-empleados', [
            'resultados' => Datos::where($this->campo,$this->condicion,$this->valor)->orderBy('id_empleado','ASC')->get()
        ]);
    }
}
