<?php

namespace App\View\Components;

use App\Models\Datos;
use Illuminate\View\Component;

class PopUp extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->ubicaciones = Datos::select('ubicacion')->groupBy('ubicacion')->get();
        $this->departamentos = Datos::select('departamento')->groupBy('departamento')->get();
        $this->jefes = Datos::select('jefe_inmediato')->groupBy('jefe_inmediato')->get();
        $this->puestos = Datos::select('puesto')->groupBy('puesto')->get();
        $this->tipos = Datos::select('tipo')->groupBy('tipo')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pop-up')
        ->with('ubicaciones', $this->ubicaciones)
        ->with('departamentos', $this->departamentos)
        ->with('jefes', $this->jefes)
        ->with('puestos', $this->puestos)
        ->with('tipos', $this->tipos);;
    }
}
