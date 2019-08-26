<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                return Genero::select('genero')->where('habilitado', 'true')->orderby('genero')->get();
            } else if ($categoria == 'merchandising') {
                return Tipo_merchandising::select('tipo')->where('habilitado', 'true')->orderby('tipo')->get();
            } else if ($categoria == 'implementos') {
                return Tipo_implemento::select('tipo')->where('habilitado', 'true')->orderby('tipo')->get();
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
        if ($request->categoria == 'plantas') {
            $tipo_genero = DB::table('generos')
                ->where('generos.habilitado', 'false')
                ->where('genero', $request->genero);
        } else if ($request->categoria == 'merchandising') {
            $tipo_genero = DB::table('tipo_merchandisings')
                ->where('tipo_merchandisings.habilitado', 'false')
                ->where('tipo', $request->genero);
        } else if ($request->categoria == 'implementos') {
            $tipo_genero = DB::table('tipo_implementos')
                ->where('tipo_implementos.habilitado', 'false')
                ->where('tipo', $request->genero);
        }
        $tipo_generos = $tipo_genero->get();
        
        if (count($tipo_generos, 1) == 1) {
            if ($request->categoria == 'plantas') {
                $tipo_genero = $tipo_genero->update(['generos.habilitado' => 'true']);
            }else if ($request->categoria == 'merchandising'){
                $tipo_genero = $tipo_genero->update(['tipo_merchandisings.habilitado' => 'true']);
            }else if ($request->categoria == 'implementos'){
                $tipo_genero = $tipo_genero->update(['tipo_implementos.habilitado' => 'true']);
            }
            return response()->json([
                'imagen' => $tipo_generos[0]->imagen,
                'id' => $tipo_generos[0]->id,
                'modificar' => 'modificar'
            ]);
        }

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $imagen_tipo = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/img/generos/', $imagen_tipo);
        }
        if ($request->categoria == 'plantas') {
            $genero = new Genero();
            $genero->imagen = $imagen_tipo;
            $genero->genero = $request->genero;
            $genero->descripcion = $request->descripcion;
            $genero->save();
            return $genero;
        } else if ($request->categoria == 'merchandising') {
            $merchandising = new Tipo_merchandising();
            $merchandising->imagen = $imagen_tipo;
            $merchandising->tipo = $request->genero;
            $merchandising->descripcion = $request->descripcion;
            $merchandising->save();
            return $merchandising;
        } else if ($request->categoria == 'implementos') {
            $implemento = new Tipo_implemento();
            $implemento->imagen = $imagen_tipo;
            $implemento->tipo = $request->genero;
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
    public function destroy($id, $categoria)
    {
        if ($categoria == 'plantas') {
            $genero = DB::table('productos')
                ->join('plantas', 'plantas.id_planta', '=', 'productos.id')
                ->join('generos', 'generos.id', '=', 'plantas.id_genero')
                ->where('generos.id', $id)
                ->where('productos.habilitado', 'true');

            $enviar = $genero->get();

            if (count($enviar, 1) == 0) {
                $genero = DB::table('generos')
                    ->where('generos.id', $id);

                $enviar = $genero->get();

                $genero = $genero->update([
                    'generos.habilitado' => 'false'
                ]);
            } else {
                $genero = $genero->update([
                    'productos.habilitado' => 'false',
                    'generos.habilitado' => 'false'
                ]);
            }

            return $enviar;
        } else if ($categoria == 'merchandising') {
            $merchandising = DB::table('productos')
                ->join('merchandisings', 'merchandisings.id_merchandising', '=', 'productos.id')
                ->join('tipo_merchandisings', 'tipo_merchandisings.id', '=', 'merchandisings.id_tipo')
                ->where('tipo_merchandisings.id', $id)
                ->where('productos.habilitado', 'true');

            $enviar = $merchandising->get();

            if (count($enviar, 1) == 0) {
                $merchandising = DB::table('tipo_merchandisings')
                    ->where('tipo_merchandisings.id', $id);

                $enviar = $merchandising->get();

                $merchandising = $merchandising->update([
                    'tipo_merchandisings.habilitado' => 'false'
                ]);
            } else {
                $merchandising = $merchandising->update([
                    'productos.habilitado' => 'false',
                    'tipo_merchandisings.habilitado' => 'false'
                ]);
            }

            return $enviar;
        } else if ($categoria == 'implementos') {
            $implementos = DB::table('productos')
                ->join('implemento_cultivos', 'implemento_cultivos.id_implemento', '=', 'productos.id')
                ->join('tipo_implementos', 'tipo_implementos.id', '=', 'implemento_cultivos.id_tipo')
                ->where('tipo_implementos.id', $id)
                ->where('productos.habilitado', 'true');

            $enviar = $implementos->get();

            if (count($enviar, 1) == 0) {
                $implementos = DB::table('tipo_implementos')
                    ->where('tipo_implementos.id', $id);

                $enviar = $implementos->get();

                $implementos = $implementos->update([
                    'tipo_implementos.habilitado' => 'false'
                ]);
            } else {
                $implementos = $implementos->update([
                    'productos.habilitado' => 'false',
                    'tipo_implementos.habilitado' => 'false'
                ]);
            }

            return $enviar;
        }
    }
}
