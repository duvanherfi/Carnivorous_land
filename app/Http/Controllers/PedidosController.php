<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Compra;
use DB;
use Barryvdh\DomPDF\Facade as PDF;



class PedidosController extends Controller
{


	public function mostrar(){

		$pedido_pendiente = DB::table('pedidos')->where('entregado', 'no')->get();
		$pedido_entregado = DB::table('pedidos')->where('entregado', 'si')->get();
		//$pedidos = Pedido::all();


		return view('pedidos',compact('pedido_pendiente', 'pedido_entregado'));

    }

    public function pdf(){
        $pedidos=Pedido::all();
        $pdf=PDF::loadView('informe',compact('pedidos'));

       return $pdf->download('Informe.pdf');
    }




    public function detalles($id){



		$pedido = DB::table('pedidos')
		->join('compras', 'compras.id_pedido', '=', 'pedidos.id')
		->where('compras.id_pedido', $id)
		->get();

    	return response()->json(['success' => $pedido]);

    }



    public function cambiar($id){


		$pedido1= Pedido::findOrFail($id);
		$pedido1->entregado='si';
		$pedido1->save();

    	return response()->json(['success' => $pedido1]);

    }






}
