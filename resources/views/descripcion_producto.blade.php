@extends('plantilla')

@section('contenido')
<div class="descripcion-producto">
    <div id="app" class="container">
        <carrousel-descripcion categoria="{{ $categoria }}" id="{{ $id }}"></carrousel-descripcion>
        <contenido-descripcion></contenido-descripcion>
        {{-- Subtitulo --}}
        <br><br>
        <h2 class="row justify-content-center subtitulo-DS w-100 m-0">PRODUCTOS MÁS DESTACADOS</h2>
        <div class="row align-items-center row justify-content-center w-100 m-0">
            <hr class="izquierda-DS ml-0 mr-2" style="width:200px;">✻
            <hr class="derecha-DS ml-2 mr-0" style="width:200px;">
        </div>
        {{-- /Subtitulo --}}
        <!--Cartas-->
        <div id="app" class="row justify-content-center w-100 m-0" data-aos="fade-up"
            data-aos-anchor-placement="top-center">
            <productos tipo="calificacion"></productos>
        </div>
        <!--/Cartas-->
    </div>
</div>
@endsection