<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genero;
use App\Tipo_implemento;
use App\Tipo_merchandising;

class TiposControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $categoria)
    {
        if ($request->ajax()) {
            if ($categoria == 'plantas') {
                return Genero::select('genero')->get();
            } else if ($categoria == 'merchandising') {
                return Tipo_merchandising::select('tipo')->get();
            } else if ($categoria == 'implementos') {
                return Tipo_implemento::select('tipo')->get();
            }
        } else {
            return view('inicio');
        }
    }

    public function tipoEspecifico($tipo, $categoria)
    {
        
        if ($categoria == 'plantas') {
            return Genero::where('genero', $tipo)->first();
        } else if ($categoria == 'merchandising') {
            return Tipo_merchandising::where('tipo', $tipo)->first();
        } else if ($categoria == 'implementos') {
            return Tipo_implemento::where('tipo', $tipo)->first();
        }
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

        if ($request->hasFile('imagen_tipo')) {
            $file = $request->file('imagen_tipo');
            $imagen_tipo = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/img/generos/', $imagen_tipo);
        }
        if ($request->categoria == 'plantas') {
            $genero = new Genero();
            $genero->imagen = $imagen_tipo;
            $genero->genero = $request->nombre;
            $genero->descripcion = $request->descripcion;
            $genero->save();
            return $genero;
        } else if ($request->categoria == 'merchandising') {
            $merchandising = new Tipo_merchandising();
            $merchandising->imagen = $imagen_tipo;
            $merchandising->tipo = $request->nombre;
            $merchandising->descripcion = $request->descripcion;
            $merchandising->save();
            return $merchandising;
        } else if ($request->categoria == 'implementos') {
            $implemento = new Tipo_implemento();
            $implemento->imagen = $imagen_tipo;
            $implemento->tipo = $request->nombre;
            $implemento->descripcion = $request->descripcion;
            $implemento->save();
            return $implemento;
        }
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
        if ($request->categoria == 'plantas') {
            $genero = Genero::find($id);
            if ($request->hasFile('imagen')) {
                $file = $request->file('imagen');
                $imagen = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/img/generos/', $imagen);
                unlink(public_path() . '/img/generos/' . $request->imagennombreAntiguo);
                $genero->imagen = $imagen;
            }
            $genero->genero = $request->genero;
            $genero->descripcion = $request->descripcion;
            $genero->save();
            return $genero;
        } else if ($request->categoria == 'merchandising') {
            $merchandising = Tipo_merchandising::find($id);
            if ($request->hasFile('imagen')) {
                $file = $request->file('imagen');
                $imagen = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/img/generos/', $imagen);
                unlink(public_path() . '/img/generos/' . $request->imagennombreAntiguo);
                $merchandising->imagen = $imagen;
            }
            $merchandising->tipo = $request->genero;
            $merchandising->descripcion = $request->descripcion;
            $merchandising->save();
            return $merchandising;
        } else if ($request->categoria == 'implementos') {
            $implemento = Tipo_implemento::find($id);
            if ($request->hasFile('imagen')) {
                $file = $request->file('imagen');
                $imagen = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/img/generos/', $imagen);
                unlink(public_path() . '/img/generos/' . $request->imagennombreAntiguo);
                $implemento->imagen = $imagen;
            }
            $implemento->tipo = $request->genero;
            $implemento->descripcion = $request->descripcion;
            $implemento->save();
            return $implemento;
        }
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
