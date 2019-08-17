@extends('plantilla')

@section('contenido')
<div id="app" class="row contenedor-productos w-100">
    <menu-inventario></menu-inventario>
    <contenido-inventario gestion="{{ $gestion }}"></contenido-inventario>
</div>
@endsection