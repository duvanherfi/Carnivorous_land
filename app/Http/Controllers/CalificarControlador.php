<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalificarControlador extends Controller
{
    public function registrar(Request $request){
        $count = count($request->session()->get('id'));
        for ($i=0; $i < $count; $i++) {
            if ($request[$i][0]['calificacion'] != 0) {
                $producto = DB::table('productos')
                        ->where('id', $request[$i][0]['id']);
                
                $BD_calificacion = $producto->get()[0]->calificacionDecimal;
                if ($BD_calificacion == 0){
                    $producto->update(['calificacion' => $request[$i][0]['calificacion'],
                                       'calificacionDecimal' => $request[$i][0]['calificacion']]);
                }else{
                    $BD_calificacion = ($BD_calificacion + $request[$i][0]['calificacion']) / 2;
                    $producto->update(['calificacion' => round($BD_calificacion),
                                       'calificacionDecimal' => round($BD_calificacion, 7)]);
                }
            } 
        }
    }
}
