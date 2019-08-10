



@extends('plantilla')
@section('contenido')
    

<div class="container pt-5 mt-5 ">
<h3 class="mt-5 datos">Datos personales</h3>
<form>
    {{--Nombre --}}

    @foreach ($usuarios as $user )
        
 
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" placeholder="{{$user->nombre}}">
    </div>

    {{--Correo --}}
    <div class="form-group col-md-6">
        <label for="correo">Correo</label>
    <input type="email" class="form-control" id="correo" aria-describedby="avisoCorreo" placeholder="{{$user->correo}}" readonly>
        <small id="avisoCorreo" class="form-text text-muted">No puedes editar tu correo ingresado en el registro.</small>
      </div>
    </div>
    {{--Cédula --}}
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="cedula">Cédula</label>
      <input type="number" class="form-control" id="cedula" aria-describedby="avisoCedula" placeholder="{{$user->cedula}}" readonly>
        <small id="avisoCedula" class="form-text text-muted">No puedes editar tu cédula ingresada en el registro.</small>
      </div>

    {{--Teléfono --}}
   
      <div class="form-group col-md-6">
        <label for="telefono">Teléfono</label>
      <input type="tel" class="form-control" id="telefono" placeholder="{{$user->telefono}}">
      </div>
   
    </div>
     {{--Fecha de nacimiento --}}
     <div class="form-row">
      <div class="form-group col-md-6">
        <label for="fecha_nacimiento">Fecha de naciemiento</label>
        <input type="text" class="form-control" id="fecha_nacimiento" aria-describedby="avisoFecha" placeholder="{{$user->fecha_nacimiento}}" readonly>
        <small id="avisoFecha" class="form-text text-muted">No puedes editar tu fecha de nacimiento ingresada en el registro.</small>
      </div>
    
     {{--Sexo --}}
      <div class="form-group col-md-6">
        <label for="sexo">Sexo</label>
        <input type="text" class="form-control" id="sexo" aria-describedby="avisoSexo" placeholder="{{$user->sexo}}" readonly>
        <small id="avisoSexo" class="form-text text-muted">No puedes editar tu sexo ingresado en el registro.</small>
      </div>
    </div>
        {{--Dirección --}}
        <h3 class="mt-5 datos">Datos de entrega</h3>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="departamento">Departamento</label>
                <input type="text" class="form-control" id="departamento" placeholder="{{$user->departamento}}">
            </div>
        

            <div class="form-group col-md-6">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="form-control" id="ciudad" placeholder="{{$user->ciudad}}">
             </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="Barrio">Barrio</label>
                <input type="text" class="form-control" id="Barrio" placeholder="{{$user->barrio}}">
            </div>

            <div class="form-group col-md-6">
                <label for="via">Vía</label>
                <input type="text" class="form-control" id="via" placeholder="{{$user->via}}"">
            </div>  
        </div>



        @endforeach
      <div class="form-group">
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>
  </form>
</div>
  @endsection