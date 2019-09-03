<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Comentarios;

class CorreoControlador extends Controller
{
    
    public function escribenos(Request $request){

        $destinatario = $request->correo;
        $nombre = $request->nombre;
        $mensaje = $request->mensaje;

      //  Mail::to('kevin777b@gmail.com')->send(new Comentarios());
       
        return view('correo')
        ->with($mensaje);
       
        

      

        
    }
}
