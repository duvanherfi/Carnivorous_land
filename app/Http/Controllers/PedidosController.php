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
	
	public function pdfVentasAño(Request $request){

		DB::statement("SET lc_time_names = 'es_ES'");
		$Año = $request->informeAño;
		$meses = DB::table('pedidos')->where(DB::raw('YEAR(fecha)'), $Año)
		->where('entregado', 'si')
		->select(DB::raw('MONTHNAME(fecha) as Mes, SUM(total) as Valor'))->groupBy('Mes')
		->orderBy('Valor', 'desc')
		->get();
		$total = DB::table('pedidos')
		->where(DB::raw('YEAR(fecha)'), $Año)
		->where('entregado','si')
		->select(DB::raw('SUM(total) as Total'))->first();
	
		// $todosMeses = (object)[
		// 	['Mes' => 'Enero', 'Valor' => 0],
		// 	['Mes' => 'Febrero', 'Valor' => 0],
		// 	['Mes' => 'Marzo', 'Valor' => 0],
		// 	['Mes' => 'Abril', 'Valor' => 0],
		// 	['Mes' => 'Junio', 'Valor' => 0],
		// 	['Mes' => 'Julio', 'Valor' => 0],
		// 	['Mes' => 'Agosto', 'Valor' => 0],
		// 	['Mes' => 'Septiembre', 'Valor' => 0],
		// 	['Mes' => 'Octubre', 'Valor' => 0],
		// 	['Mes' => 'Noviembre', 'Valor' => 0],
		// 	['Mes' => 'Diciembre', 'Valor' => 0],
		// ];
		// $meses = (object)array_merge((array)$meses, (array)$todosMeses);
		// return view('informeVentasAño',compact('meses', 'Año'));
		$pdf=PDF::loadView('informeVentasAño',compact('meses', 'Año', 'total'));

       return $pdf->download('Informe Ventas Año.pdf');
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
