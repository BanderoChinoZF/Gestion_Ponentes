<?php

namespace App\Http\Livewire;

use App\Models\SesionesModel;
use App\Models\Tallerista;
use Livewire\Component;
use Livewire\WithPagination;

class Sesiones extends Component
{
    use WithPagination;
    
    public $search = "";
    public $tallerista_id;

    public $initialdate = "2021/01/01";
    public $finaldate = "//";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingInitialdate(){
        $this->resetPage();
    }

    public function updatingFinaldate(){
        $this->resetPage();
    }

    public function render()
    {
        if( $this->finaldate == '//'){
            $this->finaldate = date('Y/m/d');
        }

        if($this->tallerista_id != null){
            // $sesiones = SesionesModel::where('fecha', 'like', '%'.$this->search.'%')
            // ->where('id', $this->tallerista_id)
            // ->latest('id')
            // ->paginate(12);
            $sesiones = SesionesModel::where('fecha', '>=', $this->initialdate)
            ->where('fecha', '<=' ,$this->finaldate)
            ->where('id', $this->tallerista_id)
            ->latest('id')
            ->paginate(12);
        }else{
            // $sesiones = SesionesModel::where('fecha', 'like', '%'.$this->search.'%')
            $sesiones = SesionesModel::where('fecha', '>=', $this->initialdate)
            ->where('fecha', '<=' ,$this->finaldate)
            ->latest('id')
            ->paginate(12);
        }
        $talleristas = Tallerista::all();

        return view('livewire.sesiones', compact('sesiones', 'talleristas'));
    }
}
