<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios; 
use Validator;
use Session;
use redirect;
use DB;
use Hash;

class loginController extends Controller
{
    //
    public function login(){

        return view('login');
    }

    public function valida(Request $request){
		$correo= $request ->input('correo');
		$password= $request ->input('password');
	    

		$consulta= Usuarios::where('correo','=',$correo)
        ->get();
        
        if (count($consulta)==0 or $consulta[0]->activo=='0') 
        {
            $notificacion = array(
                'message' => 'Usuario no existe o está inactivo.',
                'alert-type' => 'error');
        
            return redirect()->back()->with($notificacion);
            
		}

        else
        {
            $user = Usuarios::where('correo', '=', $correo)->first();
           
            if (Hash::check($request ->input('password'), $user->contrasena)) 
            {
                    $request->session()->put('session_id', $consulta[0]->id);
                    $request->session()->put('session_nombre', $consulta[0]->nombre);
                

                    $session_id = $request->session()->get('session_id');
                    $session_nombre = $request->session()->get('session_nombre');
                   

                    return view('inicio');

        
            }
            else
            {
                    $notificacion = array(
                                    'message' => 'contraseña incorrecta.',
                                    'alert-type' => 'error');
                
                    return redirect()->back()->with($notificacion);

            }

        }
    }

    public function inicio(){

        return view('inicio');
    }

    public function registrate()
	{
		        return view ('registrate');
    }

    public function guardaregistro(Request $request)
    {
               
                $nombre = $request->nombre;
                $a_paterno = $request->ap_paterno;
                $a_materno = $request->ap_materno;
                $correo = $request->correo;
                $contrasena = $request->contrasena;
                $activo = $request->activo;
                $existe = \DB::table('usuario')
                            ->select('correo')
                            ->where('correo',$correo)
                            ->get();
        
            if(count($existe)>0)
            {
                    $notificacion = array(
                                    'message' => 'Ese correo ya esta registrado',
                                    'alert-type' => 'error');
                    return redirect()->back()->with($notificacion);
            }
 
                $usuarios=new Usuarios;
                $usuarios->nombre=$request->nombre;
                $usuarios->a_paterno=$request->ap_paterno;
                $usuarios->a_materno=$request->ap_materno;
                $usuarios->correo=$request->correo;
                $usuarios->contrasena=Hash::make($contrasena);
                $usuarios->activo=$request->activo;
                $usuarios->save();
                $notificacion = array(
                                'message' => 'Registro exitoso!',
                                'alert-type' => 'success');
                return redirect()->back()->with($notificacion);
 
     }
     public function logout(Request $request) 
     {
                 
     
                 $id	= $request->session()->forget('session_id');
                 $nombre = $request->session()->forget('session_nombre');
             
                 $guarda =session()->save();
                     
                 $notificacion = array(
                 'message' => 'Sesion cerrada con éxito',
                 'alert-type' => 'error');
 
                 return view('login')->with($notificacion);		
     }
}
