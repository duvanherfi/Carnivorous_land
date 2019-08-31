@extends('plantilla')
@section('contenido')
<div id="app" class="container pt-5 mt-5 carrito">
  <filas-carrito></filas-carrito>
  <table class="table table-bordered container">
    <thead>
      <tr>
        <th class="total_compra" scope="col">Total de la compra</th>
        <th class="total_compra" id="precio" scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td id="entrega-compra" class="ml-5">
          <p class="text-center">Entrega</p>
        </td>
        <td>
          <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">

            {{--Select1 --}}
            <div class="form-group col-md-4">
              <label for="inputState">Departamento</label>
              <select id="departamento" class="form-control">
                <option selected></option>

              </select>
            </div>


            {{--Select2 --}}
            <div class="form-group col-md-4">
              <label for="inputState">Ciudad</label>
              <select id="inputState" class="form-control">
                <option selected>Escoge</option>
                <option>Cali</option>
              </select>
            </div>


            {{--Checkbox --}}
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Servicio a domicilio
                </label>
              </div>
            </div>
            <p>Costo adicicional de $5.000</p>

            {{-- text --}}

            <div class="form-group">
              <label for="inputAddress">Dirección</label>
              <input type="text" class="form-control" id="inputAddress" placeholder="Calle 13CN #..">
            </div>

            {{--Checkbox --}}
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="personal">
                <label class="form-check-label" for="personal">
                  Entrega personal
                </label>
              </div>
            </div>
            <p>Las entregas personales se hacen el sótano de la 14 de Calima <br>
              en la sección de muebles, un almacén llamado Galería Multimuebles.<br>
              Cali, Valle del cauca.
            </p>
            {{-- submit--}}

            <input name="merchantId" type="hidden" id="merchantId">
            <input name="accountId" type="hidden" id="accountId">
            <input name="description" type="hidden" id="description">
            <input name="referenceCode" type="hidden" id="referenceCode">
            <input name="amount" type="hidden" id="amount">
            <input name="tax" type="hidden" id="tax">
            <input name="taxReturnBase" type="hidden" id="taxReturnBase">
            <input name="currency" type="hidden" value="COP">
            <input name="signature" type="hidden" id="signature">
            <input name="test" type="hidden" value="1">
            <input name="buyerEmail" type="hidden" id="buyerEmail">
            <input name="responseUrl" type="hidden" value="http://www.test.com/response">
            <input name="confirmationUrl" type="hidden" value="http://www.test.com/confirmation">
            <input name="Submit" class="btn bg-success" id="terminar_compra" type="submit" value="TERMINAR COMPRA">
          </form>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@section('script')
<script>
  $('#departamento').html("<option>{{ auth()->user()->departamento}}</option>");
        var merchantId= 508029;
        var ApiKey= "4Vj8eK4rloUd272L48hsrarnUA";
        var referenceCode= "Producto1";
        var amount=20000;
        var tax=3193;
        var taxReturnBase=16806;
        var currency= "COP";
        var accountId=512326;
        var buyerEmail= "{{ auth()->user()->correo }}";
        var description="Test PAYU";
        var signature=md5(ApiKey+"~"+merchantId+"~"+referenceCode+"~"+amount+"~"+currency);
        var p=$("#precio").html().split("$");
        var p1=p[1].split(".");

        $('#merchantId').val(merchantId);
        $('#accountId').val(accountId);
        $('#description').val(description);
        $('#referenceCode').val(referenceCode);
        $('#amount').val(amount);
        $('#tax').val(tax);
        $('#taxReturnBase').val(taxReturnBase);
        $('#signature').val(signature);
        $('#buyerEmail').val(buyerEmail);
        console.log(signature);
        //$('#preciop').val(p1[0]+p1[1]);

</script>
@endsection

@endsection