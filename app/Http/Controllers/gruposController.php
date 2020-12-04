<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grupos; 
use Validator;
use Session;
use redirect;
use DB;

class gruposController extends Controller
{
    public function grupos(){
        $grupos = Grupos::all();

        return view('grupos')->with(['grupos'=>$grupos]);
    }

    public function guardagrupo(Request $request){
       
        $nombre = $request->nombre;
 
        $existe = \DB::table('grupos')
                       ->select('nombre')
                       ->where('nombre',$nombre)
                       ->get();
 
        if(count($existe)>0) {
    
        $notificacion = array(
                            'message' => 'Ese grupo ya esta registrado',
                            'alert-type' => 'error'
                             );
                                     
        return redirect()->back()->with($notificacion);
   
        }
 
        $grupo=new Grupos;
        $grupo->nombre=$request->nombre;
        $grupo->save();
        $notificacion = array(
                            'message' => 'Grupo registrado con éxito',
                            'alert-type' => 'success'
                             );
                        
 
       return redirect()->back()->with($notificacion);
 
 
   }

    public function editagrupo(Grupos $id_grupo,Request $request){  
   
   
        $id_grupo->update(array(
        'id_grupo'=>$request->input('id_grupo'),
        'nombre'=>$request->input('nombre')
        ));

        $notificacion = array(
                            'message' => 'Grupo editado con exito.',
                            'alert-type' => 'info'
                            );

        // return redirect()->route("busquedaestado",['idest'=>$idest->idest])->with($notificacion);
        return redirect()->back()->with($notificacion);

    }

    //funcion eliminar
    public function eliminagrupo(Grupos $id_grupo){
        $id_grupo->delete();
        $notificacion = array(
                            'message' => 'Grupo eliminado con exito.',
                            'alert-type' => 'error'
                             );
        
        // return redirect()->route("busquedaestado")->with($notificacion);
        return redirect()->back()->with($notificacion);

    }

}
