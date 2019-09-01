



@extends('plantilla')
@section('contenido')


<div class="container pt-5 mt-5 ">
    <br>
    <br>
@if (session()->has('act'))
<div class="alert alert-success" role="alert">
    {{ session('act') }}
   datos actualizados con exito
</div>
@endif

<h3 class="mt-5 datos">Datos personales</h3>

<form method="POST" action=" {{ route('actualizar', $user) }} ">
    {{--Nombre --}}
    {{ method_field('PUT') }}
    @csrf

    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="nombre">Nombres</label>
    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $user->nombre }}" placeholder="tu nombre" required >
    </div>

    
      <div class="form-group col-md-4">
        <label for="apellido">Apellidos</label>
      <input type="text" class="form-control" name="apellido" id="apellido" value="{{ $user->apellido }}" placeholder="tus apellidos" required>
      </div>

    {{--Correo --}}
    <div class="form-group col-md-4">
        <label for="correo">Correo</label>
    <input type="email" class="form-control" name="correo" id="correo" value="{{ $user->correo }} "aria-describedby="avisoCorreo" placeholder="tu correo" readonly>
        <small id="avisoCorreo" class="form-text text-muted">No puedes editar tu correo ingresado en el registro.</small>
      </div>
    </div>
    {{--Cédula --}}
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="cedula">Cédula</label>
      <input type="number" class="form-control" name="cedula" id="cedula" aria-describedby="avisoCedula" value="{{ $user->cedula }}" placeholder="tu cédula" readonly>
        <small id="avisoCedula" class="form-text text-muted">No puedes editar tu cédula ingresada en el registro.</small>
      </div>

    {{--Teléfono --}}

      <div class="form-group col-md-6">
        <label for="telefono">Teléfono</label>
      <input type="tel" class="form-control" name="telefono" id="telefono" value="{{ $user->telefono }}" placeholder="tu telefono" required>
      </div>

    </div>
     {{--Fecha de nacimiento --}}
     <div class="form-row">
      <div class="form-group col-md-6">
        <label for="fecha_nacimiento">Fecha de naciemiento</label>
        <input type="text" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ $user->fecha_nacimiento }}" aria-describedby="avisoFecha" placeholder="tu fecha de nacimiento" readonly>
        <small id="avisoFecha" class="form-text text-muted">No puedes editar tu fecha de nacimiento ingresada en el registro.</small>
      </div>

     {{--Sexo --}}
      <div class="form-group col-md-6">
        <label for="sexo">Sexo</label>
        <input type="text" class="form-control" name="sexo" id="sexo" aria-describedby="avisoSexo" value="{{ $user->sexo }}" placeholder="tu sexo" readonly>
        <small id="avisoSexo" class="form-text text-muted">No puedes editar tu sexo ingresado en el registro.</small>
      </div>
    </div>
        {{--Dirección --}}
        <h3 class="mt-5 datos">Datos de entrega</h3>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="departamento">Departamento</label>
                <input type="text" class="form-control" name="departamento" id="departamento" value="{{ $user->departamento }}" placeholder="Tu departamento" required>
            </div>


            <div class="form-group col-md-6">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $user->ciudad }}" placeholder="tu ciudad" required>
             </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="Barrio">Barrio</label>
                <input type="text" class="form-control" id="Barrio" name="barrio" value="{{ $user->barrio }}" placeholder="{{$user->barrio}}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="via">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $user->direccion }}" placeholder="tu dirección" required>
            </div>
        </div>




      <div class="form-group">
      <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success">Guardar cambios</button>
    </div>
  



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h2 class="row subtitulo-DS pt-3 w-100 m-0">
              <img class="" src="/img/precaucion.png" alt="Icono de precaucion" width="30">¡ADVERTENCIA!</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      ¿Está seguro que desea actualizar sus datos?
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Avanzar</button>
        <button type="button" class="btn botones" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</form>

</div>
  @endsection
