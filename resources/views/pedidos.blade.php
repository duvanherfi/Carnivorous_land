@extends('plantilla')

@section('contenido')

<div class="pedido">

	<h2 class="row subtitulo-DS pt-3 w-100 m-0">PEDIDOS PENDIENTES</h2><br>
	

	<table class="table tabla">
  		<thead class="cabecera_pedidos">
    		<tr>
      		
            <th scope="col">Entregado</th>
            <th scope="col">Fecha</th>
            <th scope="col">Nombre cliente</th>
            <th scope="col">Nombre producto(s)</th>
            <th scope="col">Ciudad</th>
            <th scope="col">Estado</th>
            <th scope="col">Detalle</th>
        
    		</tr>
  		</thead>
  		<tbody class="cuerpo_pedidos">
       	@foreach ( $pedidos as $pedido)
    		<tr>
      			
            <td><div class="custom-control custom-switch">
            	<input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
            	<label class="custom-control-label" for="customSwitch4"></label>
          		</div>
        	</td>
            <td>{{$pedido->fecha}}</td>
            <td>{{$pedido->nombre_cliente}}</td>
            <td>{{$pedido->nombre_producto}}</td>
            <td>{{$pedido->ciudad}}</td>
            <td>{{$pedido->estado}}</td>
            <td><input type=image src="{{ asset('img/pedidos/ver.png') }}" data-toggle="modal" data-target="#modal_pedidos"></td>
      			
    		</tr>

  		@endforeach()
        
  		</tbody>
	</table>


  <br><br><h2 class="row subtitulo-DS pt-3 w-100 m-0">PEDIDOS ENTREGADOS</h2><br>

  	<table class="table tabla" >

      <thead class="cabecera_pedidos">
        <tr>
            <th scope="col">Entregado</th>
            <th scope="col">Fecha</th>
            <th scope="col">Nombre cliente</th>
            <th scope="col">Nombre producto(s)</th>
            <th scope="col">Ciudad</th>
            <th scope="col">Estado</th>
            <th scope="col">Detalle</th>
        </tr>
      </thead>

      <tbody class="cuerpo_pedidos">
        <tr>

            <td><div class="custom-control custom-switch">
            	<input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
            	<label class="custom-control-label" for="customSwitch4"></label>
          		</div>
        	</td>
            <td>01-08-2019</td>
            <td>Johhan Andres Perez Carrillo</td>
            <td>Tropical Sundews, Cape Sundews</td>
            <td>Cali, Valle del cauca</td>
            <td>Pagado</td>
            <td><input type=image src="{{ asset('img/pedidos/ver.png') }}" data-toggle="modal" data-target="#modal_pedidos"></td>
        </tr>

        <tr>
            <td><div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch5" checked>
            <label class="custom-control-label" for="customSwitch5"></label>
          </div>
        </td>
            <td>05-06-2019</td>
            <td>Duvan Hernandez Figueroa</td>
            <td>Winter Growing Sundews</td>
            <td>Cali, Valle del cauca</td>
            <td>Pagado</td>
            <td><input type=image src="{{ asset('img/pedidos/ver.png') }}"></td>
        </tr>
        <tr>
            <td><div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch6" checked>
            <label class="custom-control-label" for="customSwitch6"></label>
          </div>
        </td>
            <td>15-02-2019</td>
            <td>Andres Felipe Garcia Gaviria</td>
            <td>Cape Sundews</td>
            <td>Cali, Valle del cauca</td>
            <td>En proceso</td>
            <td><input type=image src="{{ asset('img/pedidos/ver.png') }}"></td>
        </tr>
      </tbody>
  	</table><br><br><br><br>


</div>



<div class="modal" id="modal_pedidos" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="row subtitulo-DS pt-3 w-100 m-0">DESCRIPCIÓN DEL PEDIDO</h2><br>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <br><p class="mb10 text-justify">Nombre: Johhan Andres Perez Carrillo <br>
              Destino: Yumbo, valle del cauca<br>
              Dirección: Carrera 6# 10 an 24<br>
              Tipo de entrega: Domicilio<br>
              Estado: Pagado</p>

              <table class="table">
                <thead class="cabecera_pedidos">
                  <tr>
                    <th scope="col">Nombre del articulo</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Imagen</th>
                  </tr>
                </thead>

                <tbody class="cuerpo_pedidos">
                  <tr>
                    <td>Tropical Sundews</td>
                    <td>1</td>
                    <td>50.000</td>
                    <td>Imagen</td>           
                  </tr>
                  <tr>
                    <td>Cape Sundews</td>
                    <td>1</td>
                    <td>80.000</td>
                    <td>Imagen</td>           
                  </tr>                            
                </tbody>

                <thead class="final_pedido">
                  <tr>
                    <th scope="col">TOTAL</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">130.000</th>
                  </tr>
                </thead>
              </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn botones" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@endsection 