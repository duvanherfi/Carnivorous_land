@extends('plantilla')

@section('contenido')
<div id="app" class="row contenedor-productos w-100">
    <menu-producto-tips tipo="{{ $tipo }}"></menu-producto-tips>
    <contenido-productos tipo="{{ $tipo }}"></contenido-productos>
</div>
@endsection