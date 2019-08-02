@extends('plantilla')
@section('quienes_somos')


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" async>
    </script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"
        async>
    </script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" async>
    </script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/js/mdb.min.js" async>
    </script>
    <!--Scripts para el Footer -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"
        async>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"
        async>
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"
        async>
    </script>
     <!-- Libreria AOS js npm i aos -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   




            <div class="titulo carrousel">
                <h1 id="titulo_quienes_somos" class="pt-5 mt-5">¿QUIÉNES SOMOS?</h1>
            </div>

            <img class="d-block w-100 ajuste-imagen-DS" alt="planta_carnivora" src="{{ asset('img/quienes_somos/fondo_quienes_somos.jpg') }}">

            <h2 class="row justify-content-center subtitulo-DS pt-3">Un poco de historia..</h2>
            <div id="separador" class="row align-items-center row justify-content-center">
                <hr align="left" class="izquierda-DS ml-0 mr-2" noshade="noshade" style="width:200px;">✻
                <hr align="left" class="derecha-DS ml-2 mr-0" noshade="noshade" style="width:200px;"php >
            </div>

            <!-- Sección de Historia-->
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p class="p-3">
                            Carnivorous Land nació como un proyecto de cultivo, reproducción y venta de Plantas Carnívoras en Cali, Colombia, que paso a paso hemos crecido, enseñando a grandes y chicos lo maravillosas que son estas plantas.
                            <br>
                            <br>
                            En la actualidad tenemos una gran colección de estas maravillosas plantas, las cuales hemos ido reproduciendo para poder brindar los mejores ejemplares a nuestros ''Carnicultores''​.
                            Nuestro Invernadero esta ubicado cerca a Ginebra, Valle.
                            <br>
                            <br>
                            Si tienes un vivero y estas interesado en comercializar nuestras maravillosas plantas, contáctanos.
                        </p>
                    </div>
                    <div class="col">
                        <img class=" p-3 d-block w-100 "  alt="matera con una planta" src="{{ asset('img/quienes_somos/historia.jpg') }}" width="300" >

                    </div>
                </div>

            </div>
    <!-- Fin sección historia-->

    <!-- Misión y visión -->
    <div id="misi_visi" data-aos="fade-up" data-aos-duration="1500" >
        <div class="row">
            <div class="col p-3">
                <h2>Misión</h2>
                </div>
            <div class="col p-3">
                <h2>Visión</h2>
            </div>

            <div class="w-100"></div>

            <div class="col">
                <P class="pl-4"> Somos una empresa dedicada a la producción y comercialización de plantas Carnívoras,
                    que mediante la investigación y pasión por este tipo de plantas,
                    buscamos la concientización de importancia de estos seres vivos en los ecosistemas.</P>
            </div>
            <div class="col">
                <P class="pr-4"> Ser en el 2023 la empresa líder en producción y comercialización de Plantas Carnívoras en Colombia,
                    caracterizándose por la calidad de cultivo y servicio,
                    haciendo uso de las buenas prácticas medioambientales.
                </P>
            </div>


        </div>

    </div>
    <!-- Fin Misión y visión -->



    <!-- Valores-->

    <h2 class="p-3">Valores</h2>
    <div class="container">
            <div class="row">
                <div class="col pb-5 col-md-7">
                        <ul class="list-group lista">
                                <li class="list-group-item">Espíritu constructivo</li>
                                <li class="list-group-item resaltar" data-aos="fade-right" data-aos-duration="2000">Profesionalismo</li>
                                <li class="list-group-item">Honestidad</li>
                                <li class="list-group-item resaltar"  data-aos="fade-right" data-aos-duration="2000">Compromiso</li>
                                <li class="list-group-item">Responsabilidad</li>
                                <li class="list-group-item resaltar"  data-aos="fade-right" data-aos-duration="2000">Enfoque en la mejora continua</li>
                            </ul>
                </div>
                <div class="col pl-5 ml-5 ">
                        <img class="pb-5" src="{{ asset('img/quienes_somos/valores.png') }}" alt="Valores corporativos" width="300">

                </div>
            </div>

        </div>


@endsection
