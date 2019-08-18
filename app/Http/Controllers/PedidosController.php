<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Compra;
use DB;



class PedidosController extends Controller
{

	public function mostrar(){

		$pedidos = Pedido::all();
		//$pedidos = DB::table('pedidos')
		//->join('compras', 'compras.id_compra', '=', 'pedidos.id_compra')
		//->get();
		
		return view('pedidos',compact('pedidos'));
		
	}

    

    public function detalles($id){

    	
		$pedido= Pedido::findOrFail($id);


    	return response()->json(['success' => $pedido]);
    	
    }



   

    
}
