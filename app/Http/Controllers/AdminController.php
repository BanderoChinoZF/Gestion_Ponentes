<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Datos;
use App\Models\SesionesModel;

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

    public function sesiones(Request $request)
    {
        if($request->idsesion){
            $id = $request->idsesion;
            $sesion = SesionesModel::select(
                'idsesion',
                'fecha',
                'status',
                'tallerista.nombre_tallerista AS tallerista',
                'num_asistentes',
                'tiposesion',
                'imagen')->join('tallerista','tallerista.id','sesiones.id')->where('idsesion',$id)->get();
        }else{
            $sesion = null;
        }

        $sesiones = SesionesModel::select(
            'idsesion',
            'fecha',
            'status',
            'tallerista.nombre_tallerista AS tallerista',
            'num_asistentes',
            'tiposesion',
            'imagen')->join('tallerista','tallerista.id','sesiones.id')->orderBy('idsesion','ASC')->paginate(12);

        return view('Administrador.sesiones')->with('sesion',$sesion)->with('sesiones',$sesiones);
    }

    public function showSesion($id)
    {
        
        $sesion = SesionesModel::select(
            'idsesion',
            'fecha',
            'status',
            'tallerista.nombre_tallerista AS tallerista',
            'num_asistentes',
            'tiposesion',
            'imagen',
            'comentario1',
            'comentario2',
            'comentario3',
            'comentario4',
            'preg1resp1',
            'preg1resp2',
            'preg1resp3',
            'preg1resp4',
            'preg1resp5',
            'preg2resp1',
            'preg2resp2',
            'preg2resp3',
            'preg2resp4',
            'preg2resp5',
            'preg3resp1',
            'preg3resp2',
            'preg3resp3',
            'preg3resp4',
            'preg3resp5',
            'preg4resp1',
            'preg4resp2',
            'preg4resp3',
            'preg4resp4',
            'preg4resp5')->join('tallerista','tallerista.id','sesiones.id')->where('idsesion',$id)->get();
        $sesion = $sesion[0];
        return view('Administrador.sesion',compact('sesion'));
    }


    //------------------------------------------------------------------------------------------------------------
    
}
