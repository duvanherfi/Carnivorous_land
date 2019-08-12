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
        $credenciales=$this->validate($request,[
            'correo'=>'email|required|string',
            'password'=> 'required|string'
        ]);

      //Método que  realiza una consulta a la base de datos que retorna la contraseña y correo, del correo con el
      // que se intenta inciar sesión y lo compara con los campos ingresados en el formulario


      if(Auth::attempt($credenciales)){
        return redirect()->route('inicio');
      }else {
        return back()->withErrors(['correo'=>trans('auth.failed'),
                                    'password'=>trans('auth.failed')])
                    ->withInput(request(['correo']));
    }

}

  public function mostrar_datos(){
    $correo=auth()->user()->correo;
    $usuarios = DB::table('users')
     ->join('clientes', 'users.correo', '=', 'clientes.correo')
     ->select('*')
     ->where('clientes.correo','=', $correo)
      ->get();


    return view('mis_datos',compact('usuarios'));

  }

  public function logout(){
    Auth::logout();
    return redirect()->route('inicio');
  }


  public function actualizar(Request $request){

    $correo=auth()->user()->correo;

            DB::table('users')
              ->where('correo', $correo)
              ->update(['nombre' => $request->nombre,
                      'telefono' => $request->telefono
            ]);

            DB::table('clientes')
              ->where('correo', $correo)
              ->update(['departamento' => $request->departamento,
                        'ciudad' => $request->ciudad,
                        'barrio' => $request->barrio,
                        'via' => $request->via
            ]);

            return dd("Se actualizaron exitosamento los datos");
  }
}
