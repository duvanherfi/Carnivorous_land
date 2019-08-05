

@extends('plantilla')
@section('contenido') 
<div class="container pt-5 mt-5 carrito">
        <table id="cart" class="table table-hover table-condensed pt-5 mt-5">
                        <thead id="carrito_tabla">
                            <tr>
                                <th style="width:50%">Producto</th>
                                <th style="width:10%">Precio</th>
                                <th style="width:8%">Cantidad</th>
                                <th style="width:22%" class="text-center">Subtotal</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-th="Product" >
                                    <div class="row">
                                        <div class="col-sm-10 ml-3">
                                            <h4 class="nomargin">Producto 1</h4>
                                            <p>Aquí va una breve descripción del producto</p>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Precio">$1.99</td>
                                <td data-th="Cantidad">
                                    <input type="number" class="form-control text-center" value="1">
                                </td>
                                <td data-th="Subtotal" class="text-center">1.99</td>
                                <td class="actions" data-th="">
                                <button class="btn btn-danger btn-sm"><img src="{{asset('img/carrito/eliminar.png')}}" alt="eliminar producto" width="25"></button>								
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><a href="#" id="continuar_comprando" class="btn">Continuar comprando</a></td>
                                <td colspan="2" class="hidden-xs"></td>
                                <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                                <td><a href="#" class="btn btn-success">Terminar compra</a></td>
                            </tr>
                        </tfoot>
                    </table>
    </div>

    @endsection