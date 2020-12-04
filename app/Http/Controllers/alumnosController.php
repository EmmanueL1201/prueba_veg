<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupos;
use App\Alumnos;
use App\Carreras;
use Validator;
use Session;
use redirect;
use DB;


class alumnosController extends Controller
{
    public function alumnos(){
        $alumnos = \DB::table('alumnos')
        ->join('grupos','grupos.id_grupo','=','alumnos.id_grupo')
        ->join('carreras','carreras.id_carrera','=','alumnos.id_carrera')
        ->select('alumnos.id_alumno as id_alumno',
        'alumnos.nombre as nombre',
        'alumnos.a_paterno as a_paterno',
        'alumnos.a_materno as a_materno',
        'carreras.id_carrera as id_carrera',
        'carreras.nombre as nombre_carrera',
        'grupos.id_grupo as id_grupo',
        'grupos.nombre as nombre_grupo',
        'alumnos.activo as activo')
        ->get();
        $carreras = Carreras::all();
        $grupos = Grupos::all();
       
        return view('alumnos')->with(['alumnos'=>$alumnos])->with(['carreras'=>$carreras])->with(['grupos'=>$grupos]);
    }

    public function guardaalumno(Request $request){
       
        $nombre = $request->nombre;
        $a_paterno = $request->a_paterno;
        $a_materno = $request->a_materno;
        $id_carrera = $request->id_carrera;
        $id_grupo = $request->id_grupo;
        $activo = $request->activo;
 
        $alumno=new Alumnos;
        $alumno->nombre=$request->nombre;
        $alumno->a_paterno=$request->a_paterno;
        $alumno->a_materno=$request->a_materno;
        $alumno->id_carrera=$request->id_carrera;
        $alumno->id_grupo=$request->id_grupo;
        $alumno->activo=$request->activo;
        $alumno->save();
        $notificacion = array(
                            'message' => 'Alumno registrado con éxito',
                            'alert-type' => 'success'
                             );
                        
 
       return redirect()->back()->with($notificacion);
 
 
   }

    public function editaalumno(Alumnos $id_alumno,Request $request){  
   
   
        $id_alumno->update(array(
        'id_alumno'=>$request->input('id_alumno'),
        'nombre'=>$request->input('nombre'),
        'a_paterno'=>$request->input('a_paterno'),
        'a_materno'=>$request->input('a_materno'),
        'id_carrera'=>$request->input('id_carrera'),
        'id_grupo'=>$request->input('id_grupo'),
        'activo'=>$request->input('activo')
        ));

        $notificacion = array(
                            'message' => 'Datos de alumno editado con exito.',
                            'alert-type' => 'info'
                            );

        // return redirect()->route("busquedaestado",['idest'=>$idest->idest])->with($notificacion);
        return redirect()->back()->with($notificacion);

    }

    //funcion eliminar
    public function eliminaalumno(Alumnos $id_alumno){
        $id_alumno->delete();
        $notificacion = array(
                            'message' => 'Alumno eliminado con exito.',
                            'alert-type' => 'error'
                             );
        
        // return redirect()->route("busquedaestado")->with($notificacion);
        return redirect()->back()->with($notificacion);

    }
}
