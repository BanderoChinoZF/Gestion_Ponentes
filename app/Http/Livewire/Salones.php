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

    public $initialdate = "2021/01/01";
    public $finaldate = "//";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatingTallerista(){
        $this->resetPage();
    }
    
    public function render()
    {
        if( $this->finaldate == '//'){
            $this->finaldate = date('Y/m/d');
        }

        $talleristas = Tallerista::all();

        $assistants = SesionesModel::where('salon','like', '%'.$this->search.'%')
        ->where('id', 'like', '%'.$this->tallerista.'%')
        ->where('fecha', '<=' ,$this->finaldate)
        ->where('fecha', '>=', $this->initialdate)
        ->paginate(10);
        return view('livewire.salones', compact('assistants', 'talleristas'));
    }
}
