<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    //AQUI SE DECLARA EL NOMBRE DE LA TABLA QUE ESTA EN MySQL
    protected $table = 'pregunta';

    //DECLARAMOS LA LLAVE PRIMARIA DE LA TABLA.
    protected $primarykey = 'id_pregunta';

    public $timestamps = false;

    //AQUI LOS ELEMENTOS DE LA TABLA.
    protected $guarded = [];
}
