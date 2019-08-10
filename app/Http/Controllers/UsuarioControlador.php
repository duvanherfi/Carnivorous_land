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
        $user->password = bcrypt($request->password);
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
    
      if(Auth::attempt(['correo' => $request->correo, 'password' => $request->password], true)){
        return redirect()->route('mis_datos');
      }else {
        return redirect()->route('login');
    }
    
}
}
