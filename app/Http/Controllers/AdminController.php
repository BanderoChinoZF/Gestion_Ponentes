<?php

namespace App\Http\Controllers;

use App\Exports\AsistentesExport;
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
use SebastianBergmann\Environment\Console;

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
    public function index(){
        //$empleados = Datos::orderBy('id_empleado','ASC')->paginate(15);
        $talleristas = Tallerista::select('*')->orderBy('nombre_tallerista','ASC')->get();

        $total_empleados = Datos::all()->count();
        $total_empleados_na = Datos::where('idsesion','=',0)->count();
        $total_empleados_a = Datos::where('idsesion','!=',0)->count();
        $porcentaje_a = ($total_empleados_a * 100) / $total_empleados;
        $porcentaje_a = round($porcentaje_a,2);
        // 
        $emp_sindicalizados = 441;
        $emp_sindicalizados_a = SesionesModel::where('tiposesion', 'sindicalizado')->sum('num_asistentes');
        $emp_sindicalizados_na = $emp_sindicalizados - $emp_sindicalizados_a;
        $porcentaje_sindicalizados_a = ($emp_sindicalizados_a * 100) / $emp_sindicalizados;
        $porcentaje_sindicalizados_a = round($porcentaje_sindicalizados_a,2);
        // 
        $emp = 173;
        $emp_a = SesionesModel::where('tiposesion', 'empleado')->sum('num_asistentes');
        $emp_na = $emp - $emp_a;
        $porcentaje_emp_a = ($emp_a * 100) / $emp;
        $porcentaje_emp_a = round($porcentaje_emp_a,2);
        // 
        $total_sesiones = SesionesModel::all()->count();
        $sesiones_faltantes = round(($total_empleados_na/15),0);
        $sobrantes = $total_empleados_na % 15;
        if($sobrantes >= 1){
            $sesiones_faltantes = $sesiones_faltantes+1;
        }

        $porcentaje = [
            'total' => $total_empleados,
            'empleados_a' => $total_empleados_a,
            'empleados_na' => $total_empleados_na,
            'porcentaje_a' => $porcentaje_a
        ];

        $porcentaje_sind = [
            'total' => $emp_sindicalizados,
            'empleados_a' => $emp_sindicalizados_a,
            'empleados_na' => $emp_sindicalizados_na,
            'porcentaje_a' => $porcentaje_sindicalizados_a
        ];

        $porcentaje_emp = [
            'total' => $emp,
            'empleados_a' => $emp_a,
            'empleados_na' => $emp_na,
            'porcentaje_a' => $porcentaje_emp_a
        ];
        
        return view('Administrador.inicio')
            // ->with('empleados',$empleados)
            // ->with('empleados_a',$empleados_a)
            ->with('talleristas',$talleristas)
            ->with('total_sesiones',$total_sesiones)
            ->with('sesiones_faltantes',$sesiones_faltantes)
            ->with('porcentaje',$porcentaje)
            ->with('porcentaje_sind',$porcentaje_sind)
            ->with('porcentaje_emp',$porcentaje_emp);
    }
    // Sesiones
    public function sesiones(){

        $talleristas = Tallerista::select('*')->orderBy('nombre_tallerista','ASC')->get();

        $resultados = SesionesModel::select(
            'idsesion',
            'fecha',
            'status',
            'tallerista.nombre_tallerista AS tallerista',
            'num_asistentes',
            'tiposesion',
            'imagen', 'ruta_imagen')->join('tallerista','tallerista.id','sesiones.id')->orderBy('idsesion','ASC')->paginate(12);


        return view('Administrador.sesiones')->with('sesiones',$resultados)->with('talleristas',$talleristas)->with('busqueda',$resultados);
    }

    public function showSesion($id){
        
        $preguntas = Pregunta::all();
        $respuestas = Respuesta::all();
        
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
            'imagen', 'ruta_imagen')->join('tallerista','tallerista.id','sesiones.id')->where('idsesion',$id)->get();

        $datas1 = SesionesModel::select(
            'preg1resp1 AS respuesta_1',
            'preg1resp2 AS respuesta_2',
            'preg1resp3 AS respuesta_3',
            'preg1resp4 AS respuesta_4',
            'preg1resp5 AS respuesta_5')->where('idsesion',$id)->get();

        
        $pregunta_1 = "['".$respuestas[0]['respuesta']."', ".$datas1[0]['respuesta_1'].
                "],['".$respuestas[1]['respuesta']."',".$datas1[0]['respuesta_2'].
                "],['".$respuestas[2]['respuesta']."', ".$datas1[0]['respuesta_3'].
                "],['".$respuestas[3]['respuesta']."', ".$datas1[0]['respuesta_4'].
                "],['".$respuestas[4]['respuesta']."', ".$datas1[0]['respuesta_5']."]";
        $arr['chartData1'] = $pregunta_1;
        $arr['chartTitle1'] = $preguntas[0]['nombre_pregunta'];
        
            
        $datas2 = SesionesModel::select(
            'preg2resp1 AS respuesta_1',
            'preg2resp2 AS respuesta_2',
            'preg2resp3 AS respuesta_3',
            'preg2resp4 AS respuesta_4',
            'preg2resp5 AS respuesta_5')->where('idsesion',$id)->get();

        $pregunta_2 = "['".$respuestas[0]['respuesta']."', ".$datas2[0]['respuesta_1'].
            "],['".$respuestas[1]['respuesta']."',".$datas2[0]['respuesta_2'].
            "],['".$respuestas[2]['respuesta']."', ".$datas2[0]['respuesta_3'].
            "],['".$respuestas[3]['respuesta']."', ".$datas2[0]['respuesta_4'].
            "],['".$respuestas[4]['respuesta']."', ".$datas2[0]['respuesta_5']."]";
        $arr['chartData2'] = $pregunta_2;
        $arr['chartTitle2'] = $preguntas[1]['nombre_pregunta'];
        
        $datas3 = SesionesModel::select(
            'preg3resp1 AS respuesta_1',
            'preg3resp2 AS respuesta_2',
            'preg3resp3 AS respuesta_3',
            'preg3resp4 AS respuesta_4',
            'preg3resp5 AS respuesta_5')->where('idsesion',$id)->get();

        $pregunta_3 = "['".$respuestas[0]['respuesta']."', ".$datas3[0]['respuesta_1'].
            "],['".$respuestas[1]['respuesta']."',".$datas3[0]['respuesta_2'].
            "],['".$respuestas[2]['respuesta']."', ".$datas3[0]['respuesta_3'].
            "],['".$respuestas[3]['respuesta']."', ".$datas3[0]['respuesta_4'].
            "],['".$respuestas[4]['respuesta']."', ".$datas3[0]['respuesta_5']."]";
        $arr['chartData3'] = $pregunta_3;
        $arr['chartTitle3'] = $preguntas[2]['nombre_pregunta'];

        $datas4 = SesionesModel::select(
            'preg4resp1 AS respuesta_1',
            'preg4resp2 AS respuesta_2',
            'preg4resp3 AS respuesta_3',
            'preg4resp4 AS respuesta_4',
            'preg4resp5 AS respuesta_5')->where('idsesion',$id)->get();

        $pregunta_4 = "['".$respuestas[0]['respuesta']."', ".$datas4[0]['respuesta_1'].
            "],['".$respuestas[1]['respuesta']."',".$datas4[0]['respuesta_2'].
            "],['".$respuestas[2]['respuesta']."', ".$datas4[0]['respuesta_3'].
            "],['".$respuestas[3]['respuesta']."', ".$datas4[0]['respuesta_4'].
            "],['".$respuestas[4]['respuesta']."', ".$datas4[0]['respuesta_5']."]";
        $arr['chartData4'] = $pregunta_4;
        $arr['chartTitle4'] = $preguntas[3]['nombre_pregunta'];
        
        $asistentes = Datos::select(
            'id_empleado',
            'nombre_completo',
            'ubicacion',
            'departamento',
            'idsesion')->where('idsesion',$id)->orderBy('id_empleado','ASC')->get();

        $sesion = $sesion[0];

        $countAsistentes = Datos::where('idsesion',$id)->count();
        
        $arr['cantidad_asistentes'] = "['Total de asistentes', ".$countAsistentes."]";

        
        return view('Administrador.sesion',$arr)
        ->with(compact('sesion'))
        ->with('preguntas',$preguntas)
        ->with('respuestas',$respuestas)
        ->with('asistentes',$asistentes);
    }

    public function buscar($tallerista){

        $preguntas = Pregunta::all();

        $respuestas = Respuesta::all();

        $resp1 = SesionesModel::where('id',$tallerista)->sum('preg1resp1');
        $resp2 = SesionesModel::where('id',$tallerista)->sum('preg1resp2');
        $resp3 = SesionesModel::where('id',$tallerista)->sum('preg1resp3');
        $resp4 = SesionesModel::where('id',$tallerista)->sum('preg1resp4');
        $resp5 = SesionesModel::where('id',$tallerista)->sum('preg1resp5');

        $pregunta_1 = "['".$respuestas[0]['respuesta']."', ".$resp1.
                      "],['".$respuestas[1]['respuesta']."',".$resp2.
                      "],['".$respuestas[2]['respuesta']."', ".$resp3.
                      "],['".$respuestas[3]['respuesta']."', ".$resp4.
                      "],['".$respuestas[4]['respuesta']."', ".$resp5."]";
        $arr['chartData1'] = $pregunta_1;
        $arr['chartTitle1'] = $preguntas[0]['nombre_pregunta'];

        $resp1 = SesionesModel::where('id',$tallerista)->sum('preg2resp1');
        $resp2 = SesionesModel::where('id',$tallerista)->sum('preg2resp2');
        $resp3 = SesionesModel::where('id',$tallerista)->sum('preg2resp3');
        $resp4 = SesionesModel::where('id',$tallerista)->sum('preg2resp4');
        $resp5 = SesionesModel::where('id',$tallerista)->sum('preg2resp5');

        $pregunta_2 = "['".$respuestas[0]['respuesta']."', ".$resp1.
                        "],['".$respuestas[1]['respuesta']."',".$resp2.
                        "],['".$respuestas[2]['respuesta']."', ".$resp3.
                        "],['".$respuestas[3]['respuesta']."', ".$resp4.
                        "],['".$respuestas[4]['respuesta']."', ".$resp5."]";
        $arr['chartData2'] = $pregunta_2;
        $arr['chartTitle2'] = $preguntas[1]['nombre_pregunta'];
        

        $resp1 = SesionesModel::where('id',$tallerista)->sum('preg3resp1');
        $resp2 = SesionesModel::where('id',$tallerista)->sum('preg3resp2');
        $resp3 = SesionesModel::where('id',$tallerista)->sum('preg3resp3');
        $resp4 = SesionesModel::where('id',$tallerista)->sum('preg3resp4');
        $resp5 = SesionesModel::where('id',$tallerista)->sum('preg3resp5');

        $pregunta_3 = "['".$respuestas[0]['respuesta']."', ".$resp1.
                        "],['".$respuestas[1]['respuesta']."',".$resp2.
                        "],['".$respuestas[2]['respuesta']."', ".$resp3.
                        "],['".$respuestas[3]['respuesta']."', ".$resp4.
                        "],['".$respuestas[4]['respuesta']."', ".$resp5."]";
        $arr['chartData3'] = $pregunta_3;
        $arr['chartTitle3'] = $preguntas[2]['nombre_pregunta'];

        $resp1 = SesionesModel::where('id',$tallerista)->sum('preg4resp1');
        $resp2 = SesionesModel::where('id',$tallerista)->sum('preg4resp2');
        $resp3 = SesionesModel::where('id',$tallerista)->sum('preg4resp3');
        $resp4 = SesionesModel::where('id',$tallerista)->sum('preg4resp4');
        $resp5 = SesionesModel::where('id',$tallerista)->sum('preg4resp5');

        $pregunta_4 = "['".$respuestas[0]['respuesta']."', ".$resp1.
                        "],['".$respuestas[1]['respuesta']."',".$resp2.
                        "],['".$respuestas[2]['respuesta']."', ".$resp3.
                        "],['".$respuestas[3]['respuesta']."', ".$resp4.
                        "],['".$respuestas[4]['respuesta']."', ".$resp5."]";
        $arr['chartData4'] = $pregunta_4;
        $arr['chartTitle4'] = $preguntas[3]['nombre_pregunta'];      

        $resultados = SesionesModel::select(
            'idsesion',
            'fecha',
            'status',
            'tallerista.nombre_tallerista AS tallerista',
            'num_asistentes',
            'tiposesion',
        'imagen', 'ruta_imagen')->join('tallerista','tallerista.id','sesiones.id')->where('tallerista.id',$tallerista)->paginate(8);
        
        //total de sesiones
        $cantidadSesiones = SesionesModel::where('id',$tallerista)->count();

        // Obtener la cantidad de personas por sesión
        $total = 0;
        $datos = [];
        foreach($resultados as $sesion){
            $id = $sesion->idsesion;
            $asistentes = Datos::where('idsesion',$id)->count();
            $datos[$id] = $asistentes;
            $total = $total + $asistentes;
        }

        $arr['asistentes'] = "['Total de asistentes', ".$total."]";
        $arr['cantidadSesiones'] = "['Cantidad de sesiones', ".$cantidadSesiones."]";

        $tallerista = Tallerista::find($tallerista);

        return view('Administrador.talleristas_sesiones', $arr)
            ->with('resultados',$resultados)
            ->with('tallerista',$tallerista)
            ->with('cantidad_sesiones',$cantidadSesiones)
            ->with('total_asistentes',$total)
            ->with('preguntas',$preguntas)
            ->with('respuestas',$respuestas);
    }

    
    // Asistentes
    public function asistentes(){
        $filtro = null;
        $valor = null;
        $empleados = Datos::select('*')->paginate(12);
        return view('Administrador.empleados', compact('empleados'))->with('filtro',$filtro)->with('valor',$valor);
    }

    public function asistente( $id ){
        $empleado = Datos::where('id_empleado',$id)->first();
        return view('Administrador.empleado', compact('empleado'));
    }

    public function asistentesFiltros($filtro, $valor){
        //Recibir el campo por el cual filtrar
        $valor = str_replace('+', ' ', $valor);//Remmplazar el '+' por un espacio
        $empleados = Datos::where($filtro, $valor)->paginate(12);
        $title = 'empleados_by_'.$filtro.'.xlsx';

        return Excel::download((new DatosExport)->condicion($filtro,'=',$valor), $title);

        // return view('Administrador.empleados', compact('empleados'))->with('filtro',$filtro)->with('valor',$valor);
    }
    //Talleritas
    public function talleristas(){
        $talleristas = Tallerista::select('*')->orderBy('nombre_tallerista','ASC')->get();
        return view('Administrador.talleristas',compact('talleristas'));
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
        return Excel::download((new DatosExport)->condicion('idsesion','!=','0'), 'empleados_con_asistencia.xlsx');
    }

    //Descargar el archivo excel de empleados sin asistencia
    public function empleadosSinAsistenciaExcel(){
        return Excel::download((new DatosExport)->condicion('idsesion','=','0'), 'empleados_sin_asistencia.xlsx');
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

    // Esportar los asistentes de una sesion
    public function exportAsistentes($id){
        return Excel::download((new AsistentesExport)->fromSesion($id), 'asistentes.xlsx');
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
