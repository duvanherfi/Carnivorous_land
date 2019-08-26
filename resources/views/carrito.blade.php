@extends('plantilla')
@section('contenido')
<div id="app" class="container pt-5 mt-5 carrito">
    <filas-carrito></filas-carrito>
</div>


<table class="table table-bordered container">
    <thead>
      <tr>
        <th class="total_compra" scope="col">Total de la compra</th>
        <th class="total_compra" id="precio" scope="col">$150.000</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td id="entrega-compra" class="ml-5">
            <p class="ml-5">Entrega</p>
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

                <input name="merchantId"    type="hidden"  value="508029"   >
                <input name="accountId"     type="hidden"  value="512321" >
                <input name="description"   type="hidden"  value="Test PAYU"  >
                <input name="referenceCode" type="hidden"  value="TestPayU" >
                <input name="amount"        type="hidden"  id="preciop"  >
                <input name="tax"           type="hidden"  value="3193"  >
                <input name="taxReturnBase" type="hidden"  value="16806" >
                <input name="currency"      type="hidden"  value="COP" >
                <input name="signature"     type="hidden"  value="7ee7cf808ce6a39b17481c54f2c57acc"  >
                <input name="test"          type="hidden"  value="1" >
                <input name="buyerEmail"    type="hidden"  value="test@test.com" >
                <input name="responseUrl"    type="hidden"  value="http://www.test.com/response" >
                <input name="confirmationUrl"    type="hidden"  value="http://www.test.com/confirmation" >
                <input name="Submit"    class="btn bg-success" id="terminar_compra"  type="submit"  value="TERMINAR COMPRA" >
              </form>
        </td>
      </tr>

    </tbody>
  </table>
  @section('script')
    <script>
        $('#departamento').html("<option>{{ auth()->user()->departamento}}</option>");
        var p=$("#precio").html().split("$");
        console.log(p[1]);
        $('#preciop').val(p[1]);
    </script>
  @endsection

@endsection

