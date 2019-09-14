@extends('plantilla')
@section('contenido')

<div class="container pt-5 mt-5">
<h3 class="mt-5 datos">Actualiza la información de tu empresa</h3>


<form method="POST" id="datos_empresa" action="{{ route('guardar') }}">
    {{--Nombre --}}
    {{ method_field('PUT') }}
    @csrf


  

    <div class="row">
            <div class="form-group col-md-6">
                    <label for="mision">Misión</label>
                    <textarea name="mision" id="mision" cols="70" rows="7" form="datos_empresa" required>{{$datos->mision}}</textarea>
        
            </div>
        
            <div class="form-group col-md-6">
                <label for="vision">Visión</label>
             <textarea name="vision" id="vision" cols="70" rows="7" form="datos_empresa" required>{{$datos->vision}}</textarea>
        
            </div>
    </div>
    <h3 class="mt-5 datos">Actualiza tus valores corporativos</h3>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="valor1">Valor 1</label>
        <input type="text" name="valor1" value="{{$valores->valor1}}" class="form-control" required>
        </div>

        <div class="form-group col-md-6">
                <label for="valor2">Valor 2</label>
        <input type="text"name="valor2"  value="{{$valores->valor2}}" class="form-control" required>
        </div>
    </div>

    <div class="row">
            <div class="form-group col-md-6">
                <label for="valor3">Valor 3</label>
                <input type="text" name="valor3" value="{{$valores->valor3}}" class="form-control" required>
            </div>
    
            <div class="form-group col-md-6">
                    <label for="valor4">Valor 4</label>
                    <input type="text" name="valor4" value="{{$valores->valor4}}" class="form-control" required>
            </div>
        </div>
    
        <div class="row">
                <div class="form-group col-md-6">
                    <label for="valor5">Valor 5</label>
                    <input type="text" name="valor5" value="{{$valores->valor5}}" class="form-control" required>
                </div>
        
                <div class="form-group col-md-6">
                        <label for="valor6">Valor 6</label>
                        <input type="text" name="valor6" value="{{$valores->valor6}}" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <button type="button" data-toggle="modal" data-target="#actualizar_datos" class="btn btn-success">Guardar cambios</button>
              </div>

          <!-- Modal -->
<div class="modal fade" id="actualizar_datos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        ¿Está seguro que desea actualizar los datos de la empresa?
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Aceptar</button>
          <button type="button" class="btn botones" data-dismiss="modal">Cancelar</button>
        
        </div>
      </div>
    </div>
  </div>    
  
    </form>
    

</div>


@endsection