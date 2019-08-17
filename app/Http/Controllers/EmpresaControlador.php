<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dato;

class EmpresaControlador extends Controller
{
        public function mostrar(){
            $datos = Dato::find(1);
            return view('quienes_somos', compact('datos'));

        }
}
