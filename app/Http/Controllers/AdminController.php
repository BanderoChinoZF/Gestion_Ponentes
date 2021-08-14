<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Datos;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\SesionesModel;
use App\Models\Tallerista;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SesionesExport;
use App\Exports\DatosExport;

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

    // Muestra el diseño que tendra la tabla al ser exportada
    public function exportarEmpleados(){
        $resultados = Datos::select(
            'id_empleado',
            'nombre_completo',
            'ubicacion',
            'departamento',
            'idsesion')->where('idsesion','0')->orderBy('id_empleado','ASC')->get();

        $pdf = PDF::loadView('Administrador.exportar-empleados',compact('resultados'));

        return view('Administrador.exportar-empleados',compact('resultados'));
    }
    //Descargar el archivo pdf
    public function datosPdf(){
        $resultados = Datos::select(
            'id_empleado',
            'nombre_completo',
            'ubicacion',
            'departamento',
            'idsesion')->where('idsesion','0')->orderBy('id_empleado','ASC')->get();

        $pdf = PDF::loadView('Administrador.exportar-empleados',compact('resultados'));

        return $pdf->download('empleados.pdf');
    }

    //Descargar el archivo excel de empleados 
    public function datosExcel(){
        return Excel::download(new DatosExport, 'datos.xlsx');
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

        $asistentes = Datos::select(
            'id_empleado',
            'nombre_completo',
            'ubicacion',
            'departamento',
            'idsesion')->where('idsesion',$id)->orderBy('id_empleado','ASC')->get();

        $data1 = $datas1[0];
        $data2 = $datas2[0];
        $data3 = $datas3[0];
        $data4 = $datas4[0];

        $sesion = $sesion[0];
        
        return view('Administrador.sesion',compact('sesion'))
        ->with('data1',$data1)
        ->with('data2',$data2)
        ->with('data3',$data3)
        ->with('data4',$data4)->with('preguntas',$preguntas)
        ->with('respuestas',$respuestas)
        ->with('asistentes',$asistentes);
    }

    public function buscar($tallerista){

        $resultados = SesionesModel::select(
            'idsesion',
            'fecha',
            'status',
            'tallerista.nombre_tallerista AS tallerista',
            'num_asistentes',
            'tiposesion',
            'imagen')->join('tallerista','tallerista.id','sesiones.id')->where('tallerista.id',$tallerista)->paginate(8);

        $tallerista = Tallerista::find($tallerista);
        
        return view('Administrador.buscar_sesiones')->with('resultados',$resultados)->with('tallerista',$tallerista);
    }

    public function exportpdf(){
        
        $resultados = SesionesModel::select(
        'idsesion',
        'fecha',
        'status',
        'tallerista.nombre_tallerista AS tallerista',
        'num_asistentes',
        'tiposesion',
        'imagen')->join('tallerista','tallerista.id','sesiones.id')->orderBy('idsesion','ASC')->get();


        return view('Administrador.exportar-pdf', compact('resultados'));
    }

    public function descargarpdf(){
        
        $resultados = SesionesModel::select(
        'idsesion',
        'fecha',
        'status',
        'tallerista.nombre_tallerista AS tallerista',
        'num_asistentes',
        'tiposesion',
        'imagen')->join('tallerista','tallerista.id','sesiones.id')->orderBy('idsesion','ASC')->get();

        $pdf = PDF::loadView('Administrador.exportar-pdf',compact('resultados'));

        return $pdf->download('sesiones.pdf');
    }

    public function exportarExcel(){
        return Excel::download(new SesionesExport, 'sesiones.xlsx');
    }
    //------------------------------------------------------------------------------------------------------------
    
}
