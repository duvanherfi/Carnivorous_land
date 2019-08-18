<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UsuarioControlador extends Controller
{

    // Método que crea un usuario y encripta la contraseña
    public function registrar(Request $request){


        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();


        return redirect('login')->with('flash','Usuario registrado con exito.');

    }

// Método que valida las credenciales y sí son correctas le permite al usuario iniciar sesión
// De lo contrario mostrará los errores correspondientes
    public function inicio_sesion(Request $request){
        $credenciales=$this->validate($request,[
            'correo'=>'email|required|string',
            'password'=> 'required|string'
        ]);

      if(Auth::attempt($credenciales)){
        return redirect()->route('inicio');
      }else {
        return back()->withErrors(['correo'=>trans('auth.failed'),
                                    'password'=>trans('auth.failed')])
                    ->withInput(request(['correo']));
    }

}
// Método que le permite al usuario logueado visualizar todos sus datos ingresados en el registro
  public function mostrar_datos(){
    $user=auth()->user();


    return view('mis_datos',compact('user'));

  }

  //Método que le permite a un usuario cerrar la sesión
  public function cerrar_sesion(){
    Auth::logout();
    return redirect()->route('inicio');
  }

// Método que le permite al usuario actualizar parte de sus datos
  public function actualizar(Request $request, User $user){

          $data = $request->all();
          $user->update($data);


          return redirect('mis_datos')->with('act','Datos actualizados correctamente.');
  }

  public function isAdmin(){


        $permiso=auth()->user()->rol;

        return $permiso;


  }
}
