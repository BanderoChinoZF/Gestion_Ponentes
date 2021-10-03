<?php

namespace App\Http\Livewire;

use App\Models\SesionesModel;
use App\Models\Tallerista;
use Livewire\Component;
use Livewire\WithPagination;

class Salones extends Component
{
    use WithPagination;
    
    public $search = "";

    public $tallerista = "";
    public $fecha = "";

    public function updatingSearch(){
        $this->resetPage();
    }
    
    public function render()
    {
        // $talleristas = Tallerista::pluck('nombre_tallerista', 'id');
        $talleristas = Tallerista::all();

        $assistants = SesionesModel::where('salon','like', '%'.$this->search.'%')
        ->where('id', 'like', '%'.$this->tallerista.'%')
        ->paginate(10);
        return view('livewire.salones', compact('assistants', 'talleristas'));
    }
}
