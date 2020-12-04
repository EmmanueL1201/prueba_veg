<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    protected $table = 'alumnos';
    protected $primaryKey = 'id_alumno';
    protected $fillable =['nombre','a_paterno','a_materno','id_carrera','id_grupo','activo'];
}
