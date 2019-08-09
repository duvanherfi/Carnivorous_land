<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
/*use Illuminate\Support\Facades\Auth;*/

class UsuarioControlador extends Controller
{
    public function store(Request $request){

        $user = new User($request->all());
        $user->save();
       
        return redirect()->route('login');

    }
/*
    public function datos(){

      auth()->user();

      return compact();
    }
    */
/*
    public function inicio_sesion (Request $request){
     

      if(Auth::attempt(['correo' => $request->correo, 'password' => $request->password])){
        return redirect()->route('inicio');
      }
       
     
        

    }
    */
}
