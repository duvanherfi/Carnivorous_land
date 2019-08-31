<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsuarioControlador extends Controller
{

    // Método que crea un usuario y encripta la contraseña
    public function registrar(Request $request){

        $datos=\Validator::make($request->all(),[
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'cedula'=>'required|string|min:8',
            'telefono'=>'required|string|min:7',
            'fecha_nacimiento'=>'required|date',
            'sexo'=>'required',
            'departamento'=>'required|string',
            'ciudad'=>'required|string',
            'barrio'=>'required|string',
            'via'=>'required|string'
        ]);
        if($datos->fails()){
            return redirect()->back()->withInput()->withErrors($datos->errors());
        }

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
    Session::flush();
    return redirect()->route('inicio');
  }

// Método que le permite al usuario actualizar parte de sus datos
  public function actualizar(Request $request, User $user){

          $data = $request->all();
          $user->update($data);
          return redirect('mis_datos')->with('act','Datos actualizados correctamente.');
  }

  public function isAdmin(){
    $permiso=null;
    try{
        $permiso=auth()->user()->rol;
    }catch(Exception $e){
        return null;
    }
    return $permiso;
  }
}
