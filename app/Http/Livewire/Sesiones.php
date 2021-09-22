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

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        if($this->tallerista_id != null){
            $sesiones = SesionesModel::where('fecha', 'like', '%'.$this->search.'%')
            ->where('id', $this->tallerista_id)
            ->latest('id')
            ->paginate(12);

        }else{
            $sesiones = SesionesModel::where('fecha', 'like', '%'.$this->search.'%')
            ->latest('id')
            ->paginate(12);
        }
        $talleristas = Tallerista::all();

        return view('livewire.sesiones', compact('sesiones', 'talleristas'));
    }
}
