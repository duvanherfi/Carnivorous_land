@extends('plantilla')
@section('contenido')
<div class="d-flex titulo">
    <h1 id="titulo_quienes_somos">¿QUIÉNES SOMOS?</h1>
</div>

<img class="d-block w-100 ajuste-imagen-DS" src="{{ asset('img/quienes_somos/fondo_quienes_somos.jpg') }}">

<h2 class="row justify-content-center subtitulo-DS pt-3 w-100 m-0">UN POCO DE HISTORIA...</h2>
<div id="separador" class="row align-items-center row justify-content-center w-100 m-0">
    <hr  class="izquierda-DS ml-0 mr-2"  style="width:200px;">✻
    <hr  class="derecha-DS ml-2 mr-0"  style="width:200px;" php>
</div>

<!-- Sección de Historia-->
<div class="container">
    <div class="row">
        <div class="col">
            <p class="p-3">
                Carnivorous Land nació como un proyecto de cultivo, reproducción y venta de Plantas Carnívoras en Cali,
                Colombia, que paso a paso hemos crecido, enseñando a grandes y chicos lo maravillosas que son estas
                plantas.
                <br>
                <br>
                En la actualidad tenemos una gran colección de estas maravillosas plantas, las cuales hemos ido
                reproduciendo para poder brindar los mejores ejemplares a nuestros ''Carnicultores''​.
                Nuestro Invernadero esta ubicado cerca a Ginebra, Valle.
                <br>
                <br>
                Si tienes un vivero y estas interesado en comercializar nuestras maravillosas plantas, contáctanos.
            </p>
        </div>
        <div class="col">
            <img class=" p-3 d-block w-100 " src="{{ asset('img/quienes_somos/historia.jpg') }}" width="300">

        </div>
    </div>

</div>
<!-- Fin sección historia-->

<!-- Misión y visión -->
<div id="misi_visi" data-aos="fade-up" data-aos-duration="1500">
    <div class="row w-100">
        <div class="col pt-3 separacion" >
            <h2>Misión</h2>
        </div>
        <div class="col p-3 pl-4 ml-2">
            <h2>Visión</h2>
        </div>

        <div class="w-100"></div>

        <div class="col separacion" >
        <P class="pl-4 mr-5 ml-3">{{$datos->mision}}</P>
        </div>
        <div class="col pl-4 ml-2">
        <P class="pr-5 ml-3">{{$datos->vision}}</P>
        </div>


    </div>

</div>
<!-- Fin Misión y visión -->

<!-- Valores-->
<h2 class="row justify-content-center subtitulo-DS pt-3 w-100 m-0">NUESTROS VALORES</h2>
<div id="separador" class="row align-items-center row justify-content-center pb-3 w-100 m-0">
    <hr  class="izquierda-DS ml-0 mr-2"  style="width:200px;">✻
    <hr  class="derecha-DS ml-2 mr-0"  style="width:200px;">
</div>

<div class="container">
    <div class="row">
        <div class="col pb-5 col-md-7">
            <ul class="list-group lista">
            <li class="list-group-item">{{$valores->valor1}}</li>
            <li class="list-group-item resaltar" data-aos="fade-right" data-aos-duration="2000">{{$valores->valor2}}</li>
            <li class="list-group-item">{{$valores->valor3}}</li>
            <li class="list-group-item resaltar" data-aos="fade-right" data-aos-duration="2000">{{$valores->valor4}}</li>
            <li class="list-group-item">{{$valores->valor5}}</li>
            <li class="list-group-item resaltar" data-aos="fade-right" data-aos-duration="2000">{{$valores->valor6}}</li>
            </ul>
        </div>


        <div class="col pl-5 ml-5 ">
            <img class="pb-5" src="{{ asset('img/quienes_somos/valores.png') }}" alt="Valores corporativos" width="300">

        </div>
    </div>

</div>
@endsection