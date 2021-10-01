<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Empleados extends Component
{
    public $tipo = '';
    public $fecha = '/';
    public $salon = '';
    public $horario = '';
    
    public function render()
    {
        if($this->fecha == '/'){
            $this->fecha = Date('Y/m/d');
        }

        if($this->horario != 'otro'){
            $empleados = DB::select("SELECT datos.id_empleado,datos.nombre_completo,datos.idsesion, sesiones.fecha, sesiones.salon,sesiones.tiposesion,sesiones.horario FROM datos JOIN sesiones ON sesiones.idsesion = datos.idsesion 
            WHERE sesiones.tiposesion LIKE '%"."$this->tipo"."%' AND sesiones.fecha LIKE '%"."$this->fecha"."%' AND  sesiones.salon LIKE '%"."$this->salon"."%' AND sesiones.horario LIKE '%"."$this->horario"."%' ");

        }else{
            $empleados = DB::select("SELECT datos.id_empleado,datos.nombre_completo,datos.idsesion, sesiones.fecha, sesiones.salon,sesiones.tiposesion,sesiones.horario FROM datos JOIN sesiones ON sesiones.idsesion = datos.idsesion 
            WHERE sesiones.tiposesion LIKE '%"."$this->tipo"."%' AND sesiones.fecha LIKE '%"."$this->fecha"."%' AND  sesiones.salon LIKE '%"."$this->salon"."%' 
            AND horario != '7:00-11:00' AND horario != '7:00-13:00' AND horario != '15:00-19:00'");
        }
        $date = 2;
        return view('livewire.empleados', compact('empleados'));
    }

    public function buscarTodos(){
        $this->tipo = '';
        $this->fecha = '';
        $this->salon = '';
        $this->horario = '';
    }
    public function search(){

    }
}
