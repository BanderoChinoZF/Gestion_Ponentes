<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Datos;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$empleados = Datos::orderBy('id_empleado','ASC')->paginate(15);

        $empleados = Datos::select(
            'id_empleado',
            'nombre_completo',
            'ubicacion',
            'departamento',
            'idsesion')->where('idsesion','0')->orderBy('id_empleado','ASC')->paginate(15);

        $empleados_a = Datos::select(
            'id_empleado',
            'nombre_completo',
            'ubicacion',
            'departamento',
            'idsesion')->where('idsesion','!=',0)->orderBy('id_empleado','ASC')->paginate(15);

        return view('Administrador.inicio')->with('empleados',$empleados)->with('empleados_a',$empleados_a);
    }

    //------------------------------------------------------------------------------------------------------------
    
}
