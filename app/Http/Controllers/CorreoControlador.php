<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Comentarios;

class CorreoControlador extends Controller
{
    
    public function escribenos(Request $request){

        $correo = $request->correo;
        $nombre = $request->nombre;
        $mensaje = $request->mensaje;
        $motivo = $request->motivo;

    
      Mail::to('cifuentes.kevin@correounivalle.edu.co')
      ->send(new Comentarios($mensaje,$correo,$nombre,$motivo));

      return redirect()->route('contactanos')->with('act','Usuario registrado con exito.');
       
        
    }
}
