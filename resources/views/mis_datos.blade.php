



@extends('plantilla')
@section('contenido')
    

<div class="container pt-5 mt-5 ">
<h3 class="mt-5 datos">Datos personales</h3>
<form>
    {{--Nombre --}}
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" placeholder="Kevin Cifuentes">
    </div>

    {{--Correo --}}
    <div class="form-group col-md-6">
        <label for="correo">Correo</label>
        <input type="email" class="form-control" id="correo" aria-describedby="avisoCorreo" placeholder="kevin@gmail.com" readonly>
        <small id="avisoCorreo" class="form-text text-muted">No puedes editar tu correo ingresado en el registro.</small>
      </div>
    </div>
    {{--Cédula --}}
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="cedula">Cédula</label>
        <input type="number" class="form-control" id="cedula" aria-describedby="avisoCedula" placeholder="1113693739" readonly>
        <small id="avisoCedula" class="form-text text-muted">No puedes editar tu cédula ingresada en el registro.</small>
      </div>

    {{--Teléfono --}}
   
      <div class="form-group col-md-6">
        <label for="telefono">Teléfono</label>
        <input type="tel" class="form-control" id="telefono" placeholder="658 96 52">
      </div>
   
    </div>
     {{--Fecha de nacimiento --}}
     <div class="form-row">
      <div class="form-group col-md-6">
        <label for="fecha_nacimiento">Fecha de naciemiento</label>
        <input type="text" class="form-control" id="fecha_nacimiento" aria-describedby="avisoFecha" placeholder="07/09/1998" readonly>
        <small id="avisoFecha" class="form-text text-muted">No puedes editar tu fecha de nacimiento ingresada en el registro.</small>
      </div>
    
     {{--Sexo --}}
      <div class="form-group col-md-6">
        <label for="sexo">Sexo</label>
        <input type="text" class="form-control" id="sexo" aria-describedby="avisoSexo" placeholder="Masculino" readonly>
        <small id="avisoSexo" class="form-text text-muted">No puedes editar tu sexo ingresado en el registro.</small>
      </div>
    </div>
        {{--Dirección --}}
        <h3 class="mt-5 datos">Datos de entrega</h3>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="departamento">Departamento</label>
                <input type="text" class="form-control" id="departamento" placeholder="Valle del cauca">
            </div>
        

            <div class="form-group col-md-6">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="form-control" id="ciudad" placeholder="Cali">
             </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="Barrio">Barrio</label>
                <input type="text" class="form-control" id="Barrio" placeholder="Petecuy">
            </div>

            <div class="form-group col-md-6">
                <label for="via">Vía</label>
                <input type="text" class="form-control" id="via" placeholder="Calle 13CN #13N40">
            </div>  
        </div>




      <div class="form-group">
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>
  </form>
</div>
  @endsection