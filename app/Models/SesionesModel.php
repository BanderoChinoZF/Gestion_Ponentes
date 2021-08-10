<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesionesModel extends Model
{
    // use HasFactory;

    //AQUI SE DECLARA EL NOMBRE DE LA TABLA QUE ESTA EN MySQL
    protected $table = 'sesiones';

    //DECLARAMOS LA LLAVE PRIMARIA DE LA TABLA.
    protected $primarykey = 'idsesion';

    public $timestamps = false;

    //AQUI LOS ELEMENTOS DE LA TABLA.
    protected $guarded = [];

}
