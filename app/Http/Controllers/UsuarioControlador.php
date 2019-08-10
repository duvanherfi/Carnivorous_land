<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cliente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UsuarioControlador extends Controller
{
    public function store(Request $request){

      
        $user = new User($request->all());
        $user->save();
       

        $cliente = new Cliente($request->all());
        $cliente->save();
       
        return redirect()->route('login');

    }
/*
    public function datos(){

      auth()->user();

      return compact();
    }
    */

    public function inicio_sesion(Request $request){
     

      //Método que  realiza una consulta a la base de datos que retorna la contraseña y correo, del correo con el
      // que se intenta inciar sesión y lo compara con los campos ingresados en el formulario
      $correo = DB::table('users')->where('correo', $request->correo)->value('correo');
      $contraseña = DB::table('users')->where('correo', $request->correo)->value('password');
  
      if($contraseña == $request->password && $correo == $request->correo){
        return redirect()->route('mis_datos');
      }else{
        return Redirect::back()->with('error_message', 'Invalid data')->withInput();
      }

     
        

    }
    
}
