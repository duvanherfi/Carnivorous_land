<!DOCTYPE html>
<html lang="en">

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
     <!-- Libreria AOS js -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   

    <!-- Libreria AOS css-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/css/mdb.min.css" rel="stylesheet">

    {{-- Fuentes --}}
    {{-- Source Sans Pro --}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900&display=swap" rel="stylesheet">
    {{-- Montserrat --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <!-- Estilos creados por DailySoft -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!--Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-DS">
        <a class="navbar-brand sincursor-DS" href="#">¡Bienvenido a Canivorous Land, déjate atrapar!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
            aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
            <ul class="navbar-nav ml-auto nav-flex-icons bordes-externo-DS">
                <li class="nav-item bordes-DS">
                    <p class="nav-link">
                        <i class="fab fa-whatsapp"></i>
                        +57 316 7973829
                    </p>
                </li>
                <li class="nav-item bordes-DS">
                    <p class="nav-link">
                        LUN - DOM | 9:00 AM - 7:30 PM
                    </p>
                </li>
                <li class="nav-item bordes-DS">
                    <a class="nav-link waves-effect waves-light">
                        INICIAR SESIÓN
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light">
                        REGISTRARSE
                    </a>
                </li>
                {{-- Icono de user --}}
                {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-default"
                                aria-labelledby="navbarDropdownMenuLink-333">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li> --}}
            </ul>
        </div>
    </nav>
    <!--/.Navbar -->

    {{-- Logo --}}
    <img class="logo" src="{{ asset('img/Logo.jpg') }}" alt="Logo Carnivorous Land">
    {{-- /Logo --}}
    {{-- Menu --}}
    <nav class="navbar navbar-expand-lg navbar-dark div2">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-33"
            aria-controls="navbarSupportedContent-33" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justificar-DS" id="navbarSupportedContent-33">
            <ul class="navbar-nav ml-auto nav-flex-icons bordes-menu-DS">
                <li class="nav-item opcion-menu-DS bordes-DS">
                    <a class="nav-link waves-effect waves-light">
                        INICIO
                    </a>
                </li>
                <li class="nav-item bordes-DS">
                    <a class="nav-link waves-effect waves-light">
                        ¿QUIÉNES SOMOS?
                    </a>
                </li>
                <li class="nav-item opcion-menu-DS bordes-DS">
                    <a class="nav-link waves-effect waves-light">
                        PRODUCTOS
                    </a>
                </li>
                <li class="nav-item opcion-menu-DS bordes-DS">
                    <a class="nav-link waves-effect waves-light">
                        TIPS DE CULTIVOS
                    </a>
                </li>
                <li class="nav-item opcion-menu-DS">
                    <a class="nav-link waves-effect waves-light">
                        CONTÁCTANOS
                    </a>
                </li>
            </ul>
        </div>
        <img class="ml-2 p-1" src="{{ asset('img/redes-sociales/facebook.png') }}" alt="Facebook" width="45">
        <img class="ml-2 p-1" src="{{ asset('img/redes-sociales/instagram.png') }}" alt="Instagram" width="45">
        <img class="ml-2 p-1" src="{{ asset('img/redes-sociales/youtube.png') }}" alt="Youtube" width="45">
        <img class="ml-2 p-1" src="{{ asset('img/redes-sociales/whatsapp.png') }}" alt="Whatsapp" width="45">
        <img class="ml-3" id="bordes-left-DS" src="{{ asset('img/carro.png') }}" alt="Carro" width="45">
        <span class="badge badge-primary badge-pill counter">1</span>
    </nav>
    {{-- /.Menu --}}
    <body>
    
        <div class="titulo carrousel">
            <h1 id="titulo_quienes_somos" class="pt-5 mt-5">¿QUIÉNES SOMOS?</h1>
        </div>
        
        <img class="d-block w-100 ajuste-imagen-DS" src="{{ asset('img/quienes_somos/fondo_quienes_somos.jpg') }}">
 
        <h2 class="row justify-content-center subtitulo-DS pt-3">Un poco de historia..</h2>
        <div id="separador" class="row align-items-center row justify-content-center">
            <hr align="left" class="izquierda-DS ml-0 mr-2" noshade="noshade">✻
            <hr align="left" class="derecha-DS ml-2 mr-0" noshade="noshade">
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
                    <img class=" p-3 d-block w-100 "  src="{{ asset('img/quienes_somos/historia.jpg') }}" width="300" >

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
            <div class="col ">
                    <ul class="list-group lista">
                            <li class="list-group-item">Espíritu constructivo</li>
                            <li class="list-group-item resaltar">Profesionalismo</li>
                            <li class="list-group-item">Honestidad</li>
                            <li class="list-group-item resaltar">o</li>
                            <li class="list-group-item">Responsabilidad</li>
                            <li class="pb-5 list-group-item resaltar">Enfoque en la mejora continua</li>
                          </ul>         
             </div>
            <div class="col">
                    <img class="pb-5" src="{{ asset('img/quienes_somos/valores.png') }}" alt="Valores corporativos" width="170"> 

            </div>
        </div>

    </div>




   <!-- Fin Valores-->

    
    </body>
 
    
    <!--Footer-->
    <footer class="footer">
        <div class="container bottom_border pt-3">
            <div class="row">
                <div class=" col-sm-4 col-md col-sm-4  col-12 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Contáctanos</h5>
                    <!--headin5_amrc-->
                    <p class="mb10">Realizamos envios a nivel de todo Colombia</p>
                    <p><img src="{{ asset('img/redes-sociales/whatsapp.png') }}" alt="Whatsapp" width="23"> +57 316
                        7973829
                    </p>
                    <p><img src="{{ asset('img/iconos-footer/placeholder.png') }}" alt="Ubicación" width="23"> Ubicados
                        en
                        la ciudad de Cali, Colombia</p>
                    <p><img src="{{ asset('img/iconos-footer/email.png') }}" alt="Email" width="23">
                        Carnivorousland@gmail.com</p>
                </div>

                <div class=" col-sm-4 col-md  col-6 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Política de calidad</h5>
                    <!--headin5_amrc-->
                    <p class="mb10 text-justify">Nuestras plantas son cultivadas de manera cuidadosa y manteniendo los
                        estándares
                        necesarios para ser amigables con el medio ambiente, garantizando la calidad del producto
                        y la satisfacción de la necesidad del cliente.</p>
                    <!--footer_ul_amrc ends here-->
                </div>

                <div class="col-sm-4 col-md  col-6 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Envios</h5>
                    <!--headin5_amrc-->
                    <img class="mb-2" src="{{ asset('img/iconos-footer/servientrega.png') }}" alt="Servientrega"
                        width="200">
                    <img src="{{ asset('img/iconos-footer/interrapidisimo.png') }}" alt="Interrapidisimo" width="200">
                    <!--footer_ul_amrc ends here-->
                </div>

                <div class=" col-sm-4 col-md  col-12 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Métodos de pago</h5>
                    <!--headin5_amrc ends here-->
                    <img src="{{ asset('img/iconos-footer/metodosdepago.png') }}" alt="Métodos de pago" width="300">
                    <!--footer_ul2_amrc ends here-->
                </div>
            </div>
        </div>


        <div class="container">
            <ul class="foote_bottom_ul_amrc center-block">
                <li><a href="">Inicio</a></li>
                <li><a href="">¿Quiénes somos?</a></li>
                <li><a href="">Productos</a></li>
                <li><a href="">Tips de cultivo</a></li>
                <li><a href="">Contáctanos</a></li>
            </ul>
            <!--foote_bottom_ul_amrc ends here-->
            <p class="text-center">Copyright @2019 | Diseñado por DailySoft</p>

            <ul class="social_footer_ul pl-0">
                <li class="pl-0"><a href=""><i class="fab fa-facebook-f"></i></a></li>
                <li><a href=""><i class="fab fa-instagram"></i></a></li>
                <li><a href=""><i class="fab fa-youtube"></i></a></li>
                <li><a href=""><i class="fab fa-whatsapp"></i></a></li>
            </ul>
            <!--social_footer_ul ends here-->
        </div>
    </footer>
    {{-- Footer --}}

<!-- Inici de la libreria AOS-->
    <script>
            AOS.init();
    </script>
</body>

</html>