@extends('plantilla')
@section('contenido')
<div id="app" class="container pt-5 mt-5 carrito">
    <filas-carrito></filas-carrito>
</div>


<table class="table table-bordered container">
    <thead>
      <tr>
        <th class="total_compra" scope="col">Total de la compra</th>
        <th class="total_compra" scope="col">$150.000</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td id="entrega-compra" class="ml-5">
            <p class="ml-5">Entrega</p>
        </td>
        <td>
            <form>

                {{--Select1 --}}
                <div class="form-group col-md-4">
                        <label for="inputState">Departamento</label>
                        <select id="inputState" class="form-control">
                          <option selected>Escoge</option>
                          <option>Valle del cauca</option>
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
                <button type="submit" class="btn bg-success" id="terminar_compra">TERMINAR COMPRA</button>
              </form>
        </td>
      </tr>
     
    </tbody>
  </table>
@endsection
