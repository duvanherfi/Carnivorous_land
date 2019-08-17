@extends('plantilla')
@section('contenido')

<div class="container pt-5 mt-5">
<h3 class="mt-5 datos">Actualiza la información de tu empresa !</h3>


<form method="POST" id="datos_empresa" action="">
    {{--Nombre --}}
    {{ method_field('PUT') }}
    @csrf


  

    <div class="row">
            <div class="form-group col-md-6">
                    <label for="mision">Misión</label>
                    <textarea name="mision" id="mision" cols="70" rows="7" form="datos_empresa">{{$datos->mision}}</textarea>
        
            </div>
        
            <div class="form-group col-md-6">
                <label for="vision">Visión</label>
             <textarea name="vision" id="vision" cols="70" rows="7" form="datos_empresa">{{$datos->vision}}</textarea>
        
            </div>
    </div>
    <h3 class="mt-5 datos">Actualiza tus valores corporativos</h3>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="valor1">Valor 1</label>
            <input type="text" class="form-control">
        </div>

        <div class="form-group col-md-6">
                <label for="valor2">Valor 2</label>
                <input type="text" class="form-control">
        </div>
    </div>

    <div class="row">
            <div class="form-group col-md-6">
                <label for="valor3">Valor 3</label>
                <input type="text" class="form-control">
            </div>
    
            <div class="form-group col-md-6">
                    <label for="valor4">Valor 4</label>
                    <input type="text" class="form-control">
            </div>
        </div>
    
        <div class="row">
                <div class="form-group col-md-6">
                    <label for="valor5">Valor 5</label>
                    <input type="text" class="form-control">
                </div>
        
                <div class="form-group col-md-6">
                        <label for="valor6">Valor 6</label>
                        <input type="text" class="form-control">
                </div>
            </div>


    </form>
    

</div>


@endsection