<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $fillable =['nombre','a_paterno','a_materno','correo','contrasena','activo'];
		

}
