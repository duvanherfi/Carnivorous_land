@extends('plantilla')
@section('contenido')
<div id="app" class="container pt-5 mt-5 carrito">
  <filas-carrito></filas-carrito>
  <table class="table table-bordered container">
    <thead>
      <tr>
        <th class="total_compra" scope="col" style="width:30%">Total de la compra</th>
        <th class="total_compra" id="precio" scope="col" style="width:70%"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td id="entrega-compra" class="ml-5">
          <p class="text-center">Entrega a domicilio</p>
        </td>
        <td>
          <div class="form-group">
            <h5 class="font-weight-bold">Datos del destinatario</h5>
            <p>Los siguientes datos son obligatorios para envios:</p>
            <p>Elige una opción</p>
          </div>

          {{-- Opcion 1 Utiliar direccion de la cuenta --}}
          <div id="accordion" role="tablist">
            <div class="custom-control custom-radio">
              <input onclick="deseleccionarOpcion1(this)" class="custom-control-input" type="radio" name="opciones"
                id="entregaDatosPropiosCheck" data-toggle="collapse" href="#entregaDatosPropios" aria-expanded="false"
                aria-controls="entregaDatosPropios" value="miDireccion">
              <label class="custom-control-label" for="entregaDatosPropiosCheck">
                Utilizar la dirección registrada en mi cuenta
              </label>
            </div>
            <div class="collapse" id="entregaDatosPropios" role="tabpanel" aria-labelledby="headingThree"
              data-parent="#accordion">
              <div class="card card-body w-50 my-2">
                <pre class="m-0"><b>Nombre:</b> {{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</pre>
                <pre class="m-0"><b>Cédula:</b> {{ auth()->user()->cedula }}</pre>
                <pre class="m-0"><b>Teléfono:</b> {{ auth()->user()->telefono }}</pre>
                <pre class="m-0"><b>Departamento:</b> {{ auth()->user()->departamento }}</pre>
                <pre class="m-0"><b>Ciudad:</b> {{ auth()->user()->ciudad }}</pre>
                <pre class="m-0"><b>Barrio:</b> {{ auth()->user()->barrio }}</pre>
                <pre class="m-0"><b>Dirección:</b> {{ auth()->user()->direccion }}</pre>
              </div>
            </div>
            {{-- /Opcion 1 Utiliar direccion de la cuenta --}}

            {{-- Opcion 2 Utilizar otros datos --}}
            <div class="custom-control custom-radio">
              <input onclick="deseleccionarOpcion2(this)" class="custom-control-input" type="radio" name="opciones"
                id="entregaOtrosDatosCheck" data-toggle="collapse" href="#entregaOtrosDatos" aria-expanded="false"
                aria-controls="entregaOtrosDatos" value="otraDireccion">
              <label class="custom-control-label" for="entregaOtrosDatosCheck">
                Utilizar otra dirección diferente a la registrada en mi cuenta
              </label>
            </div>
            <div class="collapse" id="entregaOtrosDatos" role="tabpanel" aria-labelledby="headingTwo"
              data-parent="#accordion">
              <div class="">
                <utilizar-otros-datos></utilizar-otros-datos>
              </div>
            </div>
          </div><br>
          {{-- /Opcion 2 Utilizar otros datos --}}

          <div class="form-group">
            Si desea saber algo sobre el domicilio copia el texto del cuadro,<br>
            ademas de añadir su mensaje y envialo al whatsapp al siguiente número: &nbsp
            <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=573167973829" target="_blank">
              <i class="fab fa-whatsapp"></i> +57 316 7973829</a>
            <p>Recuerde enviar el mensaje si va a comprar el(los) producto(s).</p>
            <h5 class="font-weight-bold">Información del envio</h5>
            <p class="mb-1"><b class="font-weight-bold">Si el destino es Cali:</b> Tenemos servicio a domicilio desde
              $6.000 COP según la zona.</p>
            <p><b class="font-weight-bold">Si el destino es otra ciudad:</b> El envio paqueteria se cancela contra
              entrega, dicho valor varia entre los $10.000 COP y $25.000 COP según peso y tamaño del paquete.</p>
            <p>Los tiempos de despacho se realizan de dos a tres días hábiles.</p>
          </div>

          

          <boton-terminar-compra id_ultpedido="{{ $id_ultPedido }}" correo="{{ $correo }}"></boton-terminar-compra>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@section('script')
<script>
  var cont = 1;
  var cont2 = 1;
  function deseleccionarOpcion1(input){
    cont2 = 1;
    if (cont == 2) {
      input.checked = false;
      cont = 1;
      
    }else{
      cont = 2;
    }
    botonTerminarCompra();
  }

  function deseleccionarOpcion2(input){
    cont = 1;
    if (cont2 == 2) {
      input.checked = false;
      cont2 = 1;
    }else{
      cont2 = 2;
    }
    botonTerminarCompra();
  }

  function botonTerminarCompra(){
    if (cont == 1 && cont2 == 1) {
      $('#terminar_compra').hide();
    }else{
      $('#terminar_compra').show();
    }
  }

  // function valores(){
  //   var merchantId= 508029;
  //   var ApiKey= "4Vj8eK4rloUd272L48hsrarnUA";
  //   var referenceCode= @json($id_ultPedido);
  //   var amount=$('#amount').val();
  //   var tax=0;
  //   var taxReturnBase=0;
  //   var currency= "COP";
  //   var accountId=512321;
  //   var buyerEmail= "{{ auth()->user()->correo }}";
  //   var description=$('#description').val();
  //   var signature=md5(ApiKey+"~"+merchantId+"~"+referenceCode+"~"+amount+"~"+currency);
  //   //var p=$("#precio").html().split("$");
  //   //var p1=p[1].split(".");

  //   $('#merchantId').val(merchantId);
  //   $('#accountId').val(accountId);
  //   $('#description').val(description);
  //   // $('#referenceCode').val(referenceCode);
  //   $('#amount').val(amount);
  //   $('#tax').val(tax);
  //   $('#taxReturnBase').val(taxReturnBase);
  //   $('#signature').val(signature);
  //   $('#buyerEmail').val(buyerEmail);
  //   // console.log(signature);
  //   //$('#preciop').val(p1[0]+p1[1]);
  // }

  // function llenar(){
  //   valorInput = $('input:radio[name=opciones]:checked').val()
  //   if (valorInput == 'miDireccion') {
  //     const params = {
  //       'valorTotal': $('#amount').val()
  //     }
  //     axios.post(`/carritoControl/${valorInput}`, params).then(response => {
  //       valores();
  //       $('#PayU').submit();
  //     })
  //   }else if (valorInput == 'otraDireccion'){
  //     const params = {
  //       'valorTotal': $('#amount').val(),
  //       'nombre': $('#nombre_carrito').val(),
  //       'cedula': $('#cedula_carrito').val(),
  //       'telefono': $('#telefono_carrito').val(),
  //       'departamento': $('#departamento_carrito').val(),
  //       'ciudad': $('#ciudad_carrito').val(),
  //       'barrio': $('#barrio_carrito').val(),
  //       'direccion': $('#direccion_carrito').val()
  //     }
  //     axios.post(`/carritoControl/${valorInput}`, params).then(response => {
  //       if (response.data.errores != undefined) {
  //         // console.log(response.data);
  //         var errores = JSON.stringify(response.data.errores);
  //         $('#inputErrores').val(errores);
  //         toastr.error('Los datos de la entrega fueron rechazados, por favor revisarlos');
  //       } else {
  //         $('#PayU').submit();
  //       }
  //     })
  //   }
  // }

  $(document).ready(function(){
    botonTerminarCompra();
  })
</script>
@endsection

@endsection