<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carreras; 
use Validator;
use Session;
use redirect;
use DB;

class carrerasController extends Controller
{
    public function carreras(){
        $carreras = Carreras::all();

        return view('carreras')->with(['carreras'=>$carreras]);
    }

    public function guardacarrera(Request $request){
       
        $nombre = $request->nombre;
 
        $existe = \DB::table('carreras')
                       ->select('nombre')
                       ->where('nombre',$nombre)
                       ->get();
 
        if(count($existe)>0) {
    
        $notificacion = array(
                            'message' => 'Esa carrera ya esta registrada',
                            'alert-type' => 'error'
                             );
                                     
        return redirect()->back()->with($notificacion);
   
        }
 
        $carrera=new Carreras;
        $carrera->nombre=$request->nombre;
        $carrera->save();
        $notificacion = array(
                            'message' => 'Carrera registrada con éxito',
                            'alert-type' => 'success'
                             );
                        
 
       return redirect()->back()->with($notificacion);
 
 
   }

    public function editacarrera(Carreras $id_carrera,Request $request){  
   
   
        $id_carrera->update(array(
        'id_carrera'=>$request->input('id_carrera'),
        'nombre'=>$request->input('nombre')
        ));

        $notificacion = array(
                            'message' => 'Carrera editada con exito.',
                            'alert-type' => 'info'
                            );

        // return redirect()->route("busquedaestado",['idest'=>$idest->idest])->with($notificacion);
        return redirect()->back()->with($notificacion);

    }

    //funcion eliminar
    public function eliminacarrera(Carreras $id_carrera){
        $id_carrera->delete();
        $notificacion = array(
                            'message' => 'Carrera eliminada con exito.',
                            'alert-type' => 'error'
                             );
        
        // return redirect()->route("busquedaestado")->with($notificacion);
        return redirect()->back()->with($notificacion);

    }
}
