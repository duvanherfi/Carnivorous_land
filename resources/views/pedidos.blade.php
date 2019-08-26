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
            <th scope="col">Ciudad</th>
            <th scope="col">Estado</th>
            <th scope="col">Detalle</th>


    		</tr>
  		</thead>
  		<tbody class="cuerpo_pedidos">
       	@foreach ( $pedido_pendiente as $pendiente)
    		<tr>
      			
            <td></td>
            <td>{{$pendiente->fecha}}</td>
            <td>{{$pendiente->nombre_cliente}}</td>
            <td>{{$pendiente->ciudad}}</td>
            <td>{{$pendiente->estado}}</td>
            <td><input data-id="{{$pendiente->id}}" id="detalle_pedido" type=image src="{{ asset('img/pedidos/ver.png') }}"></td>
      			
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
            <th scope="col">Ciudad</th>
            <th scope="col">Estado</th>
            <th scope="col">Detalle</th>
        </tr>
      </thead>

      <tbody class="cuerpo_pedidos">
        @foreach ( $pedido_entregado as $entregado)
        <tr>
            <td></td>
            <td>{{$entregado->fecha}}</td>
            <td>{{$entregado->nombre_cliente}}</td>
            <td>{{$entregado->ciudad}}</td>
            <td>{{$entregado->estado}}</td>
            <td><input data-id="{{$entregado->id}}" id="detalle_pedido" type=image src="{{ asset('img/pedidos/ver.png') }}"></td>
        </tr>
       @endforeach()
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
        <br>Nombre: <label id="nombre_cli" name="nombre_cli" class="font-weight-bold"></label><br>
            Destino: <label id="ciudad" name="ciudad" class="font-weight-bold"></label><br>
            Direccion: <label id="direccion" name="direccion" class="font-weight-bold"></label><br>
            Tipo de entrega: <label id="tipo_entrega" name="tipo_entrega" class="font-weight-bold"></label><br>
            Estado: <label id="estado" name="estado" class="font-weight-bold"></label><br><br>
              <table class="table">
                <thead class="cabecera_pedidos">
                  
                  <tr>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col">Imagen</th>
                  </tr>
                  
                </thead>

                <tbody class="cuerpo_pedidos">
                 
                  
                  <tr>
                    <td id="articulo_name0"></td>
                    <td id="cantidad0"></td>
                    <td id="valor0"></td>
                    <td id="imagen0"></td>             
                  </tr>

                  <tr>
                    <td id="articulo_name1"></td>
                    <td id="cantidad1"></td>
                    <td id="valor1"></td>
                    <td id="imagen1"></td>             
                  </tr>

                  <tr>
                    <td id="articulo_name2"></td>
                    <td id="cantidad2"></td>
                    <td id="valor2"></td>
                    <td id="imagen2"></td>             
                  </tr>
                                               
                </tbody>

                <thead class="final_pedido">
                  <tr>
                    <th scope="col">TOTAL</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col" id="total"></th>
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