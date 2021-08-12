<?php

namespace App\Exports;

use App\Models\SesionesModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class SesionesExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return SesionesModel::all();
//     }
// }

class SesionesExport implements FromView
{
    public function view(): View
    {
        return view('Administrador.exportar-pdf', [
            'resultados' => SesionesModel::select(
                'idsesion',
                'fecha',
                'status',
                'tallerista.nombre_tallerista AS tallerista',
                'num_asistentes',
                'tiposesion',
                'imagen')->join('tallerista','tallerista.id','sesiones.id')->orderBy('idsesion','ASC')->get()
        ]);
    }
}
