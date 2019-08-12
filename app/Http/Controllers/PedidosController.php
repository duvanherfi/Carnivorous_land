<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;


class PedidosController extends Controller
{

	public function mostrar(){

		$pedidos = Pedido::all();
		
		return view('pedidos', compact('pedidos'));
	}
    
}
