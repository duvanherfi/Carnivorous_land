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

    
      Mail::to('cifuentes.kevin@correounivalle.edu.co')
      ->send(new Comentarios($mensaje,$correo,$nombre,$motivo));

      return redirect()->route('contactanos')->with('act','Usuario registrado con exito.');
       
        
    }

    public function pedidos(){

      
      $pedidos = Pedido::all()->where('entregado', 'no');
     
     
    
   
  //  $when = now()->addMinutes(20);
  //  dd($when);
    Mail::to('cifuentes.kevin@correounivalle.edu.co')
    ->send(new Pedidos($pedidos));
    return 0;
   
     
      
  }
}
