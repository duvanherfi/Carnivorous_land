<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Pedido;
use App\Producto;
use App\Compra;
use App\Mail\Pedidos;



class PagRespuestaControlador extends Controller
{
    public function puente()
    {
        

        $ApiKey = "4Vj8eK4rloUd272L48hsrarnUA";
        $merchant_id = $_REQUEST['merchantId'];
        $referenceCode = $_REQUEST['referenceCode'];
        $TX_VALUE = $_REQUEST['TX_VALUE'];
        $New_value = number_format($TX_VALUE, 1, '.', '');
        $currency = $_REQUEST['currency'];
        $transactionState = $_REQUEST['transactionState'];
        $firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
        $firmacreada = md5($firma_cadena);
        $firma = $_REQUEST['signature'];
        $reference_pol = $_REQUEST['reference_pol'];
        $cus = $_REQUEST['cus'];
        $extra1 = $_REQUEST['description'];
        $pseBank = $_REQUEST['pseBank'];
        $lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
        $transactionId = $_REQUEST['transactionId'];

        if ($_REQUEST['transactionState'] == 4) { // Transacción aprobada
            $datosDireccion = Session::get('datosDireccion');
            DB::table('pedidos')->insert(
                ['referencia' => $referenceCode, 
                 'fecha' => date("Y-m-d"),
                 'nombre_cliente' => $datosDireccion->nombre,
                 'telefono' => $datosDireccion->telefono, 
                 'cedula' => $datosDireccion->cedula,
                 'departamento' => $datosDireccion->departamento,
                 'ciudad' => $datosDireccion->ciudad, 
                 'barrio' => $datosDireccion->barrio,
                 'direccion' => $datosDireccion->direccion,
                 'estado' => 'Transacción aprobada',
                 'total' => Session::get('valorTotal')]
            );
            $ultimoPedido = Pedido::all()->last();
            $sesion = Session::get('id');
            for ($i=0; $i < count($sesion); $i++) { 
                $producto = Session::get('producto' . $sesion[$i]);
                $productoCantidad = Producto::where('id', $producto[0]->id)->first();
                $productoCantidad = $productoCantidad->cantidad;
                $productoCantidad = $productoCantidad - $producto[0]->cantidad;
                DB::table('productos')->where('id', $producto[0]->id)->update(['cantidad' => $productoCantidad]);
                DB::table('compras')->insert(
                    ['nombre_articulo' => $producto[0]->nombre, 
                     'tamaño' => $producto[0]->tamaño,
                     'cantidad' => $producto[0]->cantidad,
                     'valor' => $producto[0]->subtotal, 
                     'id_pedido' => $ultimoPedido->id]
                );
            }
        } else if ($_REQUEST['transactionState'] == 6) { // Transacción rechazada
            $datosDireccion = Session::get('datosDireccion');
            DB::table('pedidos')->insert(
                ['referencia' => $referenceCode, 
                 'fecha' => date("Y-m-d"),
                 'nombre_cliente' => $datosDireccion->nombre,
                 'telefono' => $datosDireccion->telefono, 
                 'cedula' => $datosDireccion->cedula,
                 'departamento' => $datosDireccion->departamento,
                 'ciudad' => $datosDireccion->ciudad, 
                 'barrio' => $datosDireccion->barrio,
                 'direccion' => $datosDireccion->direccion,
                 'estado' => 'Transacción rechazada',
                 'total' => Session::get('valorTotal')]
            );
            $ultimoPedido = Pedido::all()->last();
            $sesion = Session::get('id');
            for ($i=0; $i < count($sesion); $i++) { 
                $producto = Session::get('producto' . $sesion[$i]);
                DB::table('compras')->insert(
                    ['nombre_articulo' => $producto[0]->nombre, 
                     'tamaño' => $producto[0]->tamaño,
                     'cantidad' => $producto[0]->cantidad,
                     'valor' => $producto[0]->subtotal, 
                     'id_pedido' => $ultimoPedido->id]
                );
            }
        } else if ($_REQUEST['transactionState'] == 7) { // Transacción pendiente
            $datosDireccion = Session::get('datosDireccion');
            DB::table('pedidos')->insert(
                ['referencia' => $referenceCode, 
                 'fecha' => date("Y-m-d"),
                 'nombre_cliente' => $datosDireccion->nombre,
                 'telefono' => $datosDireccion->telefono, 
                 'cedula' => $datosDireccion->cedula,
                 'departamento' => $datosDireccion->departamento,
                 'ciudad' => $datosDireccion->ciudad, 
                 'barrio' => $datosDireccion->barrio,
                 'direccion' => $datosDireccion->direccion,
                 'estado' => 'Transacción pendiente',
                 'total' => Session::get('valorTotal')]
            );
            $ultimoPedido = Pedido::all()->last();
            $sesion = Session::get('id');
            for ($i=0; $i < count($sesion); $i++) { 
                $producto = Session::get('producto' . $sesion[$i]);
                $productoCantidad = Producto::where('id', $producto[0]->id)->first();
                $productoCantidad = $productoCantidad->cantidad;
                $productoCantidad = $productoCantidad - $producto[0]->cantidad;
                DB::table('productos')->where('id', $producto[0]->id)->update(['cantidad' => $productoCantidad]);
                DB::table('compras')->insert(
                    ['nombre_articulo' => $producto[0]->nombre, 
                     'tamaño' => $producto[0]->tamaño,
                     'cantidad' => $producto[0]->cantidad,
                     'valor' => $producto[0]->subtotal, 
                     'id_pedido' => $ultimoPedido->id]
                );
            }
        } else if ($_REQUEST['transactionState'] == 104) { // Error
        } else { }


//Enviar correo de pedidos
        $pedidos = Pedido::all()->where('entregado', 'no');
        Mail::to('cifuentes.kevin@correounivalle.edu.co')
        ->send(new Pedidos($pedidos));
       
        return redirect()->route('pagRespuesta', $transactionState);
    }
}
