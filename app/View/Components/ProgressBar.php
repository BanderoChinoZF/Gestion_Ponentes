<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProgressBar extends Component
{
    public $titulo;
    public $r1;
    public $r2;
    public $r3;
    public $r4;
    public $r5;

    public function __construct($titulo, $r1,$r2,$r3,$r4,$r5)
    {
        $this->titulo = $titulo;
        $this->r1 = $r1;
        $this->r2 = $r2;
        $this->r3 = $r3;
        $this->r4 = $r4;
        $this->r5 = $r5;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.progress-bar');
    }
}
