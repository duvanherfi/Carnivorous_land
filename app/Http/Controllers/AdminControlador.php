<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class AdminControlador extends Controller
{
    public function registrar(Request $request){
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
