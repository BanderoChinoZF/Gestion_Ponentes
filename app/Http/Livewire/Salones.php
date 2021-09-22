<?php

namespace App\Http\Livewire;

use App\Models\SesionesModel;
use Livewire\Component;
use Livewire\WithPagination;

class Salones extends Component
{
    use WithPagination;
    
    public $search = "general";

    public function updatingSearch(){
        $this->resetPage();
    }
    
    public function render()
    {
        $assistants = SesionesModel::where('salon','like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.salones', compact('assistants'));
    }
}
