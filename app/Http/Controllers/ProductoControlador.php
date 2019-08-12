<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Plantas;
use App\Genero;
use App\Tipo_implemento;
use App\Tipo_merchandising;

class ProductoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('imagen_principal')){
            $file = $request->file('imagen_principal');
            $imagen_principal = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/productoss/', $imagen_principal);
        }
        if($request->hasFile('imagen2')){
            $file = $request->file('imagen2');
            $imagen2 = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/productoss/', $imagen2);
        }
        if($request->hasFile('imagen3')){
            $file = $request->file('imagen3');
            $imagen3 = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/productoss/', $imagen3);
        }
        $producto = new Producto();
        // $producto->imagen_principal = $imagen_principal;
        // $producto->imagen2 = $imagen2;
        // $producto->imagen3 = $imagen3;
        $producto->nombre = $request->input('nombre');
        $producto->valor = $request->input('valor');
        $producto->cantidad = $request->input('cantidad');
        $producto->stock_minimo = $request->input('stock_minimo');
        $producto->opcion_catalogo = $request->input('opcion_catalogo');
        $producto->descripcion = $request->input('descripcion');
        $producto->save();
        
        if ($request->categoria == 'plantas') {
            return 'Hola';
            $plantas = new Plantas();
            $id = Producto::all()->last();
            $plantas->id_planta = $id->id;
            $plantas->tamaño = $request->tamaño;
            $id = Genero::where('genero', $request->genero)->get();
            $plantas->id_genero = $id->id;
            $plantas->save();
        }

        return $plantas;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
