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
            'imagen')->join('tallerista','tallerista.id','sesiones.id')->orderBy('idsesion','ASC')->paginate(15);

        return view('Administrador.sesiones')->with('sesion',$sesion)->with('sesiones',$sesiones);
        // return view('Administrador.sesiones')->with('sesion',$sesion)->with('sesiones',$sesiones);
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
            'imagen')->join('tallerista','tallerista.id','sesiones.id')->where('idsesion',$id)->get();
        $sesion = $sesion[0];
        return view('Administrador.sesion',compact('sesion'));
    }


    //------------------------------------------------------------------------------------------------------------
    
}
