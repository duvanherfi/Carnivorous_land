@extends('plantilla')
@section('contenido')



<div class="d-flex titulo">
    <h1 id="titulo_contactanos">CONTÁCTANOS</h1>
</div>

<img class="d-block w-100 ajuste-imagen-DS" src="{{ asset('img/contactanos/fondo_contactanos.jpg') }}"
    alt="fondo_contactanos">

<h2 class="row justify-content-center subtitulo-DS pt-3 w-100 m-0">NUESTRAS REDES SOCIALES</h2>
<div id="separador" class="row align-items-center row justify-content-center w-100 m-0">
    <hr class="izquierda-DS ml-0 mr-2" style="width:200px;">✻
    <hr class="derecha-DS ml-2 mr-0" style="width:200px;">
</div>

<!-- Sección de Redes Sociales-->
<div class="container pb-3">
    <div class="row">

        <div class="col p-3 ml-5">
            <a href="https://www.facebook.com/CarnivorousLandPlantasCarnivorasColombia/?epa=SEARCH_BOX" target="_blank">
                <img id="wpp" class="ml-5" src="{{ asset('img/redes-sociales/facebook.png') }}" alt="Facebook"
                    width="100">
            </a>
        </div>

        <div class="col p-3">
            <a href="https://www.instagram.com/carnivorousland/" target="_blank">
                <img class="ml-5" src="{{ asset('img/redes-sociales/instagram.png') }}" alt="Instagram" width="100">
            </a>
        </div>

        <div class="col p-3">
            <a href="https://www.youtube.com/channel/UC-HHD-jISuSeqQnGylaow1w" target="blank">
                <img class="ml-5 " src="{{ asset('img/redes-sociales/youtube.png') }}" alt="Youtube" width="100">
            </a>
        </div>

        <div class="col mr-5 p-3">
            <a href="https://api.whatsapp.com/send?phone=573167973829" target="_blank">
                <img class="ml-5 mr-0" src="{{ asset('img/redes-sociales/whatsapp.png') }}" alt="Whatsapp" width="100">
            </a>
        </div>

    </div>

</div>
<!-- Fin sección Redes sociales-->

<!-- Ubicación -->
<!--  <h2 class="row justify-content-center subtitulo-DS pt-3">Ubicación</h2>
            <div id="separador" class="row align-items-center row justify-content-center">
                <hr align="left" class="izquierda-DS ml-0 mr-2" noshade="noshade" style="width:200px;">✻
                <hr align="left" class="derecha-DS ml-2 mr-0" noshade="noshade" style="width:200px;"php >
            </div>
        -->
<div class=" p-3 ubicacion">
    <div class="row">
        <div class="col pt-3" data-aos="fade-right" data-aos-duration="2000">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254900.13120968675!2d-76.66575507688069!3d3.395397032954704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30a6f0cc4bb3f1%3A0x1f0fb5e952ae6168!2sCali%2C+Valle+del+Cauca!5e0!3m2!1ses!2sco!4v1564714432895!5m2!1ses!2sco"
                width="600" height="510" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>
        <div id="texto-mapa" class="col pt-3 pb-3">
            <h3 class="pb-3">Ubicados en Cali, Colombia. Realizamos envíos a todo el país</h3>
            <!-- Default form subscription -->
        
        
{{--             
@if (session()->has('act'))
<div class="alert alert-light col-md-8" role="alert">
{{ session('act') }}
</div>
@endif --}}
        <form method="POST"  class="text-center  bg-success form-ubicacion border-light p-4" action="{{ route('correo') }}">
            @csrf
                
                <p class="h4 mb-4">Escríbenos</p>

                <p>Puedes enviarnos una recomendación, queja, reclamo o lo que desees!</p>

                   <!-- PQR -->
                <select class="form-control mb-4" id="motivo" name="motivo">
                    <option selected>Escoge el motivo de tu mensaje</option>
                    <option value="Queja">Queja</option>
                    <option value="Reclamo">Reclamo</option>
                    <option value="Sugerencia">Sugerencia</option>
                    <option value="Duda">Duda</option>
                </select>

                <!-- Nombre -->
                <input type="text" id="nombre" name="nombre" class="form-control  mb-4" placeholder="Tu nombre" required>

           
                <!-- Correo -->
                <input type="correo" id="correo" name="correo" class="form-control  mb-4" placeholder="Tu correo" required>

                <!-- Texto -->
                <input type="text" id="mensaje" name="mensaje" class="form-control  mb-4" placeholder="Tu mensaje" required>

                <!-- Sign in button -->
                <button type="submit" onclick="notificacion()" class="btn btn-block" >Enviar</button>
            </form>
            <!-- Default form subscription -->
        </div>
    </div>
</div>
<!-- Fin Ubicación -->
@endsection
@section('script')
<script>
function notificacion(){


    toastr.success('Correo enviado con éxito', {timeOut: 5000});
}
</script>
@endsection

