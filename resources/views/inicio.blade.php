@extends('plantilla')

@section('contenido')
<!--Carousel Wrapper-->
<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
    {{-- Titulo Carnivorous Land --}}
    <div class="titulo inicio">
        <h1>CARNIVOROUS LAND</h1>
        <h3>¡DÉJATE ATRAPAR!</h3>
        <h5>ENVIOS A TODO COLOMBIA</h5>
        <button type="button" class="btn btn-light-green">¡COMPRAR AHORA!</button>
    </div>
    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-2" data-slide-to="1"></li>
        <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner carrousel-DS" role="listbox">
        <div class="carousel-item active">
            <div class="view">
                <img class="d-block w-100 ajuste-imagen-DS" src="{{ asset('img/fotos-carrousel/1.png') }}"
                    alt="First slide">
                <div class="mask rgba-black-light"></div>
            </div>
            <div class="carousel-caption letras-DS">
                <h3 class="h3-responsive">Light mask</h3>
                <p class="texto-DS">First text</p>
            </div>
        </div>
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <img class="d-block w-100 ajuste-imagen-DS" src="{{ asset('img/fotos-carrousel/2.png') }}"
                    alt="Second slide">
                <div class="mask rgba-black-strong"></div>
            </div>
            <div class="carousel-caption letras-DS">
                <h3 class="h3-responsive">Strong mask</h3>
                <p class="texto-DS">Secondary text</p>
            </div>
        </div>
        <div class="carousel-item">
            <!--Mask color-->
            <div class="view">
                <img class="d-block w-100 ajuste-imagen-DS" src="{{ asset('img/fotos-carrousel/3.png') }}"
                    alt="Third slide">
                <div class="mask rgba-black-slight"></div>
            </div>
            <div class="carousel-caption letras-DS">
                <h3 class="h3-responsive">Slight mask</h3>
                <p class="texto-DS">Third text</p>
            </div>
        </div>
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<!--/.Carousel Wrapper-->

{{-- Subtitulo --}}
<br>
<h2 class="row justify-content-center subtitulo-DS w-100 m-0">¿POR QUÉ COMPRAR CON NOSOTROS?</h2>
<div class="row align-items-center row justify-content-center w-100 m-0">
    <hr  class="izquierda-DS ml-0 mr-2"  style="width:300px;">✻
    <hr  class="derecha-DS ml-2 mr-0"  style="width:300px;">
</div>

{{-- /Subtitulo --}}

{{-- Cartas --}}
<div class="row justify-content-center w-100 m-0" data-aos="fade-up" data-aos-anchor-placement="top-center">
    <!--Card-->
    <div class="card m-3 carta-DS" style="width: 19rem; height: 420px;">
        <!--Card image-->
        <div class="view overlay">
            <img class="imagen-DS" src="{{ asset('img/cartas/carta1.jpg') }}" alt="">
            <div class="mask rgba-white-slight"></div>
        </div>
    </div>
    <!--/.Card-->
    <!--Card-->
    <div class="card m-3 carta-DS" style="width: 19rem; height: 420px;">
        <!--Card image-->
        <div class="view overlay">
            <img class="imagen-DS" src="{{ asset('img/cartas/carta2.jpg') }}" alt="carta_imagen">
            <div class="mask rgba-white-slight"></div>
        </div>
    </div>
    <!--/.Card-->
    <!--Card-->
    <div class="card m-3 carta-DS" style="width: 19rem; height: 420px;">
        <!--Card image-->
        <div class="view overlay">
            <img class="imagen-DS" src="{{ asset('img/cartas/carta3.jpg') }}" alt="carta:imagen2">
            <div class="mask rgba-white-slight"></div>
        </div>
    </div>
    <!--/.Card-->
</div>
{{-- /Cartas --}}

{{-- Subtitulo --}}
<br>
<h2 class="row justify-content-center subtitulo-DS w-100 m-0">LO MÁS DESTACADO</h2>
<div class="row align-items-center row justify-content-center w-100 m-0">
    <hr  class="izquierda-DS ml-0 mr-2" style="width:200px;">✻
    <hr  class="derecha-DS ml-2 mr-0"  style="width:200px;">
</div>
{{-- /Subtitulo --}}

<!--Cartas-->
<div id="app" class="row justify-content-center w-100 m-0" data-aos="fade-up" data-aos-anchor-placement="top-center">
    <productos></productos>
</div>
<!--/Cartas-->

{{-- Subtitulo --}}
<br>
<h2 class="row justify-content-center subtitulo-DS w-100 m-0">EVENTOS</h2>
<div class="row align-items-center row justify-content-center w-100 m-0">
    <hr class="izquierda-DS ml-0 mr-2"  style="width:150px;">✻
    <hr  class="derecha-DS ml-2 mr-0"  style="width:150px;">
</div>
{{-- /Subtitulo --}}

{{-- Eventos --}}
<div class="row justify-content-center w-100 m-0" data-aos="fade-up" data-aos-anchor-placement="top-center">
    <img class="imagen-DS evento-DS m-3" src="{{ asset('img/eventos/evento1.jpg') }}" alt="">
    <div class="mask rgba-white-slight"></div>
</div>
{{-- /Eventos --}}
@endsection