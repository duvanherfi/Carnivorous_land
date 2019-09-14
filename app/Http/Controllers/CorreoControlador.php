<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Comentarios;
use App\Mail\Pedidos;
use App\Pedido;
use Illuminate\Support\Facades\DB;

class CorreoControlador extends Controller
{
    
    public function escribenos(Request $request){

        $correo = $request->correo;
        $nombre = $request->nombre;
        $mensaje = $request->mensaje;
        $motivo = $request->motivo;

    
      Mail::to('notificacion@carnivorousland.com')
      ->send(new Comentarios($mensaje,$correo,$nombre,$motivo));

      return redirect()->route('contactanos')->with('act','Correo enviado con éxito.');
       
        
    }

  
}
