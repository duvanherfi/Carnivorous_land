<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dato;
use App\Valor;

class EmpresaControlador extends Controller
{
        public function mostrar(){
            $datos = Dato::find(1);
            $valores = Valor::all();
            return view('quienes_somos', compact('datos','valores'));

        }

        public function actualizar(){

            $datos = Dato::find(1);

            return view('actualizar_datos', compact('datos'));
        }
}
