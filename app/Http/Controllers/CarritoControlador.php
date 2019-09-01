<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class CarritoControlador extends Controller
{
    public function obtener(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->session()->get('id');
            $productos = (array) [];
            
            foreach ($id as $posicion => $jugador) {
                $producto = $request->session()->get('producto' . $jugador);
                array_push($productos, $producto);
            }

            for ($i = 0; $i < count($productos); $i++) {
                $productos[$i][0]->subtotal = $productos[$i][0]->valor;
                $productos[$i][0]->cantidad = 1;
            }
            return $productos;
        } else {
            return view('inicio');
        }
    }

    public function agregar(Request $request)
    {
        $sesion = Session::get('id');
        if (empty($sesion)) {
            $id = (array) [];
            array_push($id, $request->id);
            Session::put('id', $id);
        } else {
            $id = Session::get('id');
            array_push($id, $request->id);
            Session::put('id', $id);
        }
        Session::put('cantidad', count($id));
        $producto = (object) [
            'id' => $request->id,
            'nombre' => $request->nombre,
            'imagen' => $request->imagen,
            'valor' => $request->valor
        ];
        $request->session()->push('producto' . $request->id, $producto);
        return Session::all();
    }

    public function eliminar($id)
    {
        $cantidad = Session::get('cantidad');
        Session::put('cantidad', $cantidad - 1);
        Session::forget('producto' . $id);
        $sesion = Session::get('id');
        $sesion = array_diff($sesion, array($id));
        Session::put('id', $sesion);
        return Session::all();
    }
}