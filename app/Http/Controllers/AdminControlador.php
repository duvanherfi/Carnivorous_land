<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class AdminControlador extends Controller
{
    public function registrar(Request $request){


        $datos=\Validator::make($request->all(),[
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'sexo' => 'required',
            'cedula'=>'required|string|min:8|max:12',
            'telefono'=>'required|string|min:7|max:10',
            'fecha_nacimiento'=>'required|date',
            'sexo'=>'required',
            'departamento'=>'required|string',
            'ciudad'=>'required|string',
            'barrio'=>'required|string',
            'direccion'=>'required|string'
        ]);
        if($datos->fails()){
            return redirect()->back()->withInput()->withErrors($datos->errors());
        }
        
        $admin = new User($request->all());
        $admin->rol = "administrador";
        $admin->password = bcrypt($request->password);
        $admin->save();

        return view('inicio');
    }

    public function mostrar(){

        return view('registrar_admin');
    }
}
