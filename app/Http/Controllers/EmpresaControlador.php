<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dato;
use App\Valor;

class EmpresaControlador extends Controller
{
        public function mostrar(){
            $datos = Dato::find(1);
            $valores = Valor::find(1);
            return view('quienes_somos', compact('datos','valores'));

        }

        public function actualizar(){
            $datos = Dato::find(1);
            $valores = Valor::find(1);
            return view('actualizar_datos', compact('datos','valores'));
        }

        public function guardar(Request $request){
            $datos = Dato::find(1);
            $valores = Valor::find(1);

            $datos->mision = $request->mision;
            $datos->save();

            $valores->valor1 = $request->valor1;
            $valores->valor2 = $request->valor2;
            $valores->valor3 = $request->valor3;
            $valores->valor4= $request->valor4;
            $valores->valor5 = $request->valor5;
            $valores->valor6 = $request->valor6;
            $valores->save();

            return redirect()->route('actualizar_datos');
        }
}
