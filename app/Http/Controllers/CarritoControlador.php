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

            foreach ($id as $posicion => $valor) {
                $producto = $request->session()->get('producto' . $valor);
                array_push($productos, $producto);
            }

            for ($i = 0; $i < count($productos); $i++) {
                $productos[$i][0]->subtotal = $productos[$i][0]->valor;
                $productos[$i][0]->cantidad = 1;
                $productos[$i][0]->calificacion = 0;
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
            'valor' => $request->valor,
            'tamaño' => $request->tamaño
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

    public function ingresarpago(Request $request){

        $transaction_date="2015-05-27 13:07:35";
        $cc_number="";
        $cc_holder=test_buyer;
        $billing_country=CO;
        $description=test_payu_01;
        $value=100.00;
        $payment_method_type=2;
        $email_buyer="test@payulatam.com";
        $response_message_pol="ENTITY_DECLINED";
        $error_message_bank="";
        $transaction_id="f5e668f1-7ecc-4b83-a4d1-0aaa68260862";
        $currency="USD";
        $ip="190.242.116.98";
        $billing_city="Bogota";

    }
}
