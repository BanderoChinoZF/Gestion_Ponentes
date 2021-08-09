<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datos extends Model
{
    //AQUI SE DECLARA EL NOMBRE DE LA TABLA QUE ESTA EN MySQL
    protected $table = 'datos';

    //DECLARAMOS LA LLAVE PRIMARIA DE LA TABLA.
    protected $primarykey = 'id_empleado';

    public $timestamps = false;

    //AQUI LOS ELEMENTOS DE LA TABLA.
    protected $fillable = [
        'nombre_completo',
        'ubicacion',
        'departamento',
        'jefe_inmediato',
        'puesto',
        'tipo',
        'idsesion'

    ];

}

