<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Datos;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\SesionesModel;
use App\Models\Tallerista;

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

    public function sesiones(){

        $talleristas = Tallerista::select('*')->orderBy('nombre_tallerista','ASC')->get();

        $resultados = SesionesModel::select(
            'idsesion',
            'fecha',
            'status',
            'tallerista.nombre_tallerista AS tallerista',
            'num_asistentes',
            'tiposesion',
            'imagen')->join('tallerista','tallerista.id','sesiones.id')->orderBy('idsesion','ASC')->paginate(12);

        // if($request->tallerista){
        //     $busqueda = $request->tallerista;
        //     $tallerista = '%'.$busqueda.'%';
        //     $resultados = SesionesModel::select(
        //         'idsesion',
        //         'fecha',
        //         'status',
        //         'tallerista.nombre_tallerista AS tallerista',
        //         'num_asistentes',
        //         'tiposesion',
        //         'imagen')->join('tallerista','tallerista.id','sesiones.id')->where('tallerista.nombre_tallerista','like',$tallerista)->paginate(3);
        // }elseif($request->idsesion){
        //     $busqueda = $request->idsesion;
        //     $resultados = SesionesModel::select(
        //         'idsesion',
        //         'fecha',
        //         'status',
        //         'tallerista.nombre_tallerista AS tallerista',
        //         'num_asistentes',
        //         'tiposesion',
        //         'imagen')->join('tallerista','tallerista.id','sesiones.id')->where('idsesion',$busqueda)->get();
        // }

        return view('Administrador.sesiones')->with('sesiones',$resultados)->with('talleristas',$talleristas)->with('busqueda',$resultados);
    }

    public function showSesion($id){
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
            'comentario4')->join('tallerista','tallerista.id','sesiones.id')->where('idsesion',$id)->get();

        $datas1 = SesionesModel::select(
            'preg1resp1 AS respuesta_1',
            'preg1resp2 AS respuesta_2',
            'preg1resp3 AS respuesta_3',
            'preg1resp4 AS respuesta_4',
            'preg1resp5 AS respuesta_5')->where('idsesion',$id)->get();
            
        $datas2 = SesionesModel::select(
            'preg2resp1 AS respuesta_1',
            'preg2resp2 AS respuesta_2',
            'preg2resp3 AS respuesta_3',
            'preg2resp4 AS respuesta_4',
            'preg2resp5 AS respuesta_5')->where('idsesion',$id)->get();
        
        $datas3 = SesionesModel::select(
            'preg3resp1 AS respuesta_1',
            'preg3resp2 AS respuesta_2',
            'preg3resp3 AS respuesta_3',
            'preg3resp4 AS respuesta_4',
            'preg3resp5 AS respuesta_5')->where('idsesion',$id)->get();

        $datas4 = SesionesModel::select(
            'preg4resp1 AS respuesta_1',
            'preg4resp2 AS respuesta_2',
            'preg4resp3 AS respuesta_3',
            'preg4resp4 AS respuesta_4',
            'preg4resp5 AS respuesta_5')->where('idsesion',$id)->get();

        $preguntas = Pregunta::all();
        $respuestas = Respuesta::all();

        $data1 = $datas1[0];
        $data2 = $datas2[0];
        $data3 = $datas3[0];
        $data4 = $datas4[0];

        $sesion = $sesion[0];
        
        return view('Administrador.sesion',compact('sesion'))
        ->with('data1',$data1)
        ->with('data2',$data2)
        ->with('data3',$data3)
        ->with('data4',$data4)->with('preguntas',$preguntas)->with('respuestas',$respuestas);
    }

    public function buscar($tallerista){

        $resultados = SesionesModel::select(
                'idsesion',
                'fecha',
                'status',
                'tallerista.nombre_tallerista AS tallerista',
                'num_asistentes',
                'tiposesion',
                'imagen')->join('tallerista','tallerista.id','sesiones.id')->where('tallerista.id',$tallerista)->paginate(6);
        
        return view('Administrador.buscar_sesiones')->with('resultados',$resultados);
    }


    //------------------------------------------------------------------------------------------------------------
    
}
