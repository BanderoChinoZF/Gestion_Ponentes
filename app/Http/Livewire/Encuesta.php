<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Encuesta extends Component
{
    public $showAll = false;
    public $id = '';

    public function __construct($id)
    {
        
    }
    public function render()
    {
        if($this->showAll){
            $encuestas = DB::select("select * from encuesta where idsesiones = '$this->id'");
        }else{
            $encuestas = DB::select("select * from encuesta where idsesiones = '$this->id' LIMIT 0, 5 ");
        }

        return view('livewire.encuesta', compact('encuestas'));
    }

    public function mas(){
        if($this->showAll){
            $this->showAll = false;
        }else{
            $this->showAll = true;
        }
    }
}
