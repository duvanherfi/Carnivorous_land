<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Producto;
use App\Planta;
use App\Genero;
use App\Implemento_cultivo;
use App\Merchandising;
use App\Tipo_implemento;
use App\Tipo_merchandising;
use PhpParser\Node\Scalar\MagicConst\File;

class ProductoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $tipo, $categoria, $lugar)
    {
        if ($request->ajax()) {
            if ($categoria == 'plantas') {
                $productos = DB::table('productos')->join('plantas', 'plantas.id_planta', '=', 'productos.id')
                    ->join('generos', 'generos.id', '=', 'plantas.id_genero')->where('genero', $tipo)->where('productos.habilitado', 'true')
                    ->select('*', 'productos.id as id_producto', 'productos.descripcion as descripcion');
            } else if ($categoria == 'merchandising') {
                $productos = DB::table('productos')->join('merchandisings', 'merchandisings.id_merchandising', '=', 'productos.id')
                    ->join('tipo_merchandisings', 'tipo_merchandisings.id', '=', 'merchandisings.id_tipo')->where('tipo', $tipo)->where('productos.habilitado', 'true')
                    ->select('*', 'productos.id as id_producto', 'productos.descripcion as descripcion');
            } else if ($categoria == 'implementos') {
                $productos = DB::table('productos')->join('implemento_cultivos', 'implemento_cultivos.id_implemento', '=', 'productos.id')
                    ->join('tipo_implementos', 'tipo_implementos.id', '=', 'implemento_cultivos.id_tipo')->where('tipo', $tipo)->where('productos.habilitado', 'true')
                    ->select('*', 'productos.id as id_producto', 'productos.descripcion as descripcion');
            } else if ($categoria == 'productosPorCalificacion') {
                $productos = DB::table('productos')->leftJoin('plantas', 'plantas.id_planta', '=', 'productos.id')->orderBy('calificacion', 'desc')
                    ->select('*', 'productos.id as id_producto', 'productos.descripcion as descripcion');
            }

            if ($lugar != 'gestion') {
                if ($categoria == 'productosPorCalificacion') {
                    $productos = $productos->where('opcion_catalogo', 'true')->paginate(3);
                } else {
                    $productos = $productos->where('opcion_catalogo', 'true')->paginate(15);
                }

                $productos->getCollection()->transform(function ($value) {
                    $sesion = Session::get('id');
                    if (empty($sesion)) {
                        $value->opcionCancelar = false;
                    } else {
                        if (in_array($value->id_producto, $sesion)) {
                            $value->opcionCancelar = true;
                        } else {
                            $value->opcionCancelar = false;
                        }
                    }
                    return $value;
                });
            } else {
                $productos = $productos->paginate(15);
            }
            return $productos;
        } else {
            return view('inicio');
        }
    }

    public function descripcion($id, $categoria)
    {
        if ($categoria == 'plantas') {
            $productos = DB::table('productos')->join('plantas', 'plantas.id_planta', '=', 'productos.id')
                ->join('generos', 'generos.id', '=', 'plantas.id_genero')->where('productos.id', $id)->where('productos.habilitado', 'true')
                ->select('*', 'productos.id as id_producto', 'productos.descripcion as descripcion')->get();
        } else if ($categoria == 'merchandising') {
            $productos = DB::table('productos')->join('merchandisings', 'merchandisings.id_merchandising', '=', 'productos.id')
                ->join('tipo_merchandisings', 'tipo_merchandisings.id', '=', 'merchandisings.id_tipo')->where('productos.id', $id)->where('productos.habilitado', 'true')
                ->select('*', 'productos.id as id_producto', 'productos.descripcion as descripcion')->get();
        } else if ($categoria == 'implementos') {
            $productos = DB::table('productos')->join('implemento_cultivos', 'implemento_cultivos.id_implemento', '=', 'productos.id')
                ->join('tipo_implementos', 'tipo_implementos.id', '=', 'implemento_cultivos.id_tipo')->where('productos.id', $id)->where('productos.habilitado', 'true')
                ->select('*', 'productos.id as id_producto', 'productos.descripcion as descripcion')->get();
        }
        $sesion = Session::get('id');

        if (empty($sesion)) {
            for ($i = 0; $i < count($productos); $i++) {
                $productos[$i]->opcionCancelar = false;
            }
        } else {
            for ($i = 0; $i < count($productos); $i++) {
                if (in_array($productos[$i]->id_producto, $sesion)) {
                    $productos[$i]->opcionCancelar = true;
                } else {
                    $productos[$i]->opcionCancelar = false;
                }
            }
        }
        return $productos;
    }

    public function productosStockMinimo(){
        $productos = DB::table('productos')->whereColumn('cantidad', '<=', 'stock_minimo')->get();
        return $productos;
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
            $producto = DB::table('productos')
                ->join('plantas', 'plantas.id_planta', '=', 'productos.id')
                ->join('generos', 'plantas.id_genero', '=', 'generos.id')
                ->where('productos.habilitado', 'false')
                ->where('nombre', $request->nombre)
                ->where('tamaño', $request->tamaño)
                ->where('genero', $request->genero)
                ->select('*', 'productos.id as id_producto');
        } else if ($request->categoria == 'merchandising') {
            $producto = DB::table('productos')
                ->join('merchandisings', 'merchandisings.id_merchandising', '=', 'productos.id')
                ->join('tipo_merchandisings', 'merchandisings.id_tipo', '=', 'tipo_merchandisings.id')
                ->where('productos.habilitado', 'false')
                ->where('nombre', $request->nombre)
                ->where('tipo', $request->genero)
                ->select('*', 'productos.id as id_producto');
        } else if ($request->categoria == 'implementos') {
            $producto = DB::table('productos')
                ->join('implemento_cultivos', 'implemento_cultivos.id_implemento', '=', 'productos.id')
                ->join('tipo_implementos', 'implemento_cultivos.id_tipo', '=', 'tipo_implementos.id')
                ->where('productos.habilitado', 'false')
                ->where('nombre', $request->nombre)
                ->where('tipo', $request->genero)
                ->select('*', 'productos.id as id_producto');
        }
        $productos = $producto->get();

        if (count($productos, 1) == 1) {
            $producto = $producto->update([
                'opcion_catalogo' => $request->opcion_catalogo,
                'productos.habilitado' => 'true'
            ]);
            return response()->json([
                'imagen_principal' => $productos[0]->imagen_principal,
                'imagen2' => $productos[0]->imagen2,
                'imagen3' => $productos[0]->imagen3,
                'id' => $productos[0]->id_producto,
                'categoria' => $request->categoria
            ]);
        }

        if ($request->hasFile('imagen_principal')) {
            $file = $request->file('imagen_principal');
            $imagen_principal = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/img/productoss/', $imagen_principal);
        }
        if ($request->hasFile('imagen2')) {
            $file = $request->file('imagen2');
            $imagen2 = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/img/productoss/', $imagen2);
        }
        if ($request->hasFile('imagen3')) {
            $file = $request->file('imagen3');
            $imagen3 = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/img/productoss/', $imagen3);
        }
        $producto = new Producto();
        $producto->imagen_principal = $imagen_principal;
        $producto->imagen2 = $imagen2;
        $producto->imagen3 = $imagen3;
        $producto->nombre = $request->input('nombre');
        $producto->valor = $request->input('valor');
        $producto->cantidad = $request->input('cantidad');
        $producto->stock_minimo = $request->input('stock_minimo');
        $producto->opcion_catalogo = $request->input('opcion_catalogo');
        $producto->descripcion = $request->input('descripcion');
        $producto->save();
        
        if ($request->categoria == 'plantas') {
            $plantas = new Planta();
            $id = Producto::all()->last();
            $plantas->id_planta = $id->id;
            $plantas->tamaño = $request->tamaño;
            $id = Genero::where('genero', $request->genero)->first();
            $plantas->id_genero = $id->id;
            $plantas->save();
        } else if ($request->categoria == 'merchandising') {
            $merchandisings = new Merchandising();
            $id = Producto::all()->last();
            $merchandisings->id_merchandising = $id->id;
            $id = Tipo_merchandising::where('tipo', $request->genero)->first();
            $merchandisings->id_tipo = $id->id;
            $merchandisings->save();
        } else if ($request->categoria == 'implementos') {
            $implemento_cultivos = new Implemento_cultivo();
            $id = Producto::all()->last();
            $implemento_cultivos->id_implemento = $id->id;
            $id = Tipo_implemento::where('tipo', $request->genero)->first();
            $implemento_cultivos->id_tipo = $id->id;
            $implemento_cultivos->save();
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
    public static function update(Request $request, $id, $categoria)
    {
        $producto = Producto::find($id);

        if ($request->hasFile('imagen_principal')) {
            $file = $request->file('imagen_principal');
            $imagen_principal = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/img/productoss/', $imagen_principal);
            unlink(public_path() . '/img/productoss/' . $request->imagen_principalnombreAntiguo);
            $producto->imagen_principal = $imagen_principal;
        }
        if ($request->hasFile('imagen2')) {
            $file = $request->file('imagen2');
            $imagen2 = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/img/productoss/', $imagen2);
            unlink(public_path() . '/img/productoss/' . $request->imagen2nombreAntiguo);
            $producto->imagen2 = $imagen2;
        }
        if ($request->hasFile('imagen3')) {
            $file = $request->file('imagen3');
            $imagen3 = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/img/productoss/', $imagen3);
            unlink(public_path() . '/img/productoss/' . $request->imagen3nombreAntiguo);
            $producto->imagen3 = $imagen3;
        }

        $producto->nombre = $request->input('nombre');
        $producto->valor = $request->input('valor');
        $producto->cantidad = $request->input('cantidad');
        $producto->stock_minimo = $request->input('stock_minimo');
        $producto->descripcion = $request->input('descripcion');
        $producto->save();

        if ($categoria == 'plantas') {
            DB::table('plantas')
                ->where('id_planta', $id)
                ->update(['tamaño' => $request->input('tamaño')]);
        }
        //     $mezcla = DB::table('productos')->join('plantas', 'plantas.id_planta', '=', 'productos.id')
        //         ->join('generos', 'generos.id', '=', 'plantas.id_genero')->where('productos.id', $id)
        //         ->select('*', 'productos.id as id_producto')->get();
        // } else if ($categoria == 'merchandising') {
        //     $mezcla = DB::table('productos')->join('merchandisings', 'merchandisings.id_merchandising', '=', 'productos.id')
        //         ->join('tipo_merchandisings', 'tipo_merchandisings.id', '=', 'merchandisings.id_tipo')->where('productos.id', $id)
        //         ->select('*', 'productos.id as id_producto')->get();
        // } else if ($categoria == 'implementos') {
        //     $mezcla = DB::table('productos')->join('implemento_cultivos', 'implemento_cultivos.id_implemento', '=', 'productos.id')
        //         ->join('tipo_implementos', 'tipo_implementos.id', '=', 'implemento_cultivos.id_tipo')->where('productos.id', $id)
        //         ->select('*', 'productos.id as id_producto')->get();
        // }

        return $producto;
    }

    public function actualizarOpcionCatalogo($opcion_catalogo, $id)
    {
        $producto = Producto::find($id);
        $producto->opcion_catalogo = $opcion_catalogo;
        $producto->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->habilitado = 'false';
        $producto->save();
    }
}
