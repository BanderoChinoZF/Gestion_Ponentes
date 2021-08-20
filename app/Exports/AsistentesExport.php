<?php

namespace App\Exports;

use App\Models\Datos;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AsistentesExport implements FromView
{
    public function fromSesion(int $id)
    {
        $this->id = $id;
        
        return $this;
    }

    public function view(): View
    {
        return view('Administrador.exportar_asistentes', [
            'asistentes' => Datos::select('*')->where('idsesion',$this->id)->orderBy('id_empleado','ASC')->get()
        ]);
    }
}