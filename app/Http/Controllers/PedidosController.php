<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Compra;
use DB;



class PedidosController extends Controller
{

	public function mostrar(){

		$pedido_pendiente = DB::table('pedidos')->where('entregado', 'no')->get();
		$pedido_entregado = DB::table('pedidos')->where('entregado', 'si')->get();
		//$pedidos = Pedido::all();
		//$pedidos = DB::table('pedidos')
		//->join('compras', 'compras.id_compra', '=', 'pedidos.id_compra')
		//->get();
		
		return view('pedidos',compact('pedido_pendiente', 'pedido_entregado' ));
		
	}

    

    public function detalles($id){
    	
    	
		$pedido= Pedido::findOrFail($id);


    	return response()->json(['success' => $pedido]);
    	
    }



   

    
}
