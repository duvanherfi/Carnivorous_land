<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Carnivorousland</title>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
    <!-- Bootstrap tooltips -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js">
    </script>
    <!-- Bootstrap core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js">
    </script>
    <!-- MDB core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.7/js/mdb.min.js">
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
            <ul class="navbar-nav ml-auto bordes-externo-DS">
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
                <li class="nav-item dropdown opcion-menu-DS bordes-DS">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        {{-- <p class="nav-link waves-effect waves-light "> --}}
                        PRODUCTOS
                        {{-- </p> --}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default col-4"
                        aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
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

    <!--Carousel Wrapper-->
    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
        {{-- Titulo Carnivorous Land --}}
        <div class="titulo carrousel">
            <h1>CARNIVOROUS LAND</h1>
            <h3>¡DÉJATE ATRAPAR!</h3>
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
    <h2 class="row justify-content-center subtitulo-DS">¿Por qué comprar con nosotros?</h2>
    <div class="row align-items-center row justify-content-center">
        <hr align="left" class="izquierda-DS ml-0 mr-2" noshade="noshade" style="width:300px;">✻
        <hr align="left" class="derecha-DS ml-2 mr-0" noshade="noshade" style="width:300px;">
    </div>
    {{-- /Subtitulo --}}

    {{-- Cartas --}}
    <div class="row justify-content-center" data-aos="fade-up" data-aos-anchor-placement="top-center">
        <!--Card-->
        <div class="card m-3 carta-DS" style="width: 19rem;">
            <!--Card image-->
            <div class="view overlay">
                <img class="imagen-DS" src="{{ asset('img/cartas/carta1.jpg') }}" alt="">
                <div class="mask rgba-white-slight"></div>
            </div>
        </div>
        <!--/.Card-->
        <!--Card-->
        <div class="card m-3 carta-DS" style="width: 19rem;">
            <!--Card image-->
            <div class="view overlay">
                <img class="imagen-DS" src="{{ asset('img/cartas/carta2.jpg') }}" alt="">
                <div class="mask rgba-white-slight"></div>
            </div>
        </div>
        <!--/.Card-->
        <!--Card-->
        <div class="card m-3 carta-DS" style="width: 19rem;">
            <!--Card image-->
            <div class="view overlay">
                <img class="imagen-DS" src="{{ asset('img/cartas/carta3.jpg') }}" alt="">
                <div class="mask rgba-white-slight"></div>
            </div>
        </div>
        <!--/.Card-->
    </div>
    {{-- /Cartas --}}

    {{-- Subtitulo --}}
    <br>
    <h2 class="row justify-content-center subtitulo-DS">Lo más destacado</h2>
    <div class="row align-items-center row justify-content-center">
        <hr align="left" class="izquierda-DS ml-0 mr-2" noshade="noshade" style="width:200px;">✻
        <hr align="left" class="derecha-DS ml-2 mr-0" noshade="noshade" style="width:200px;">
    </div>
    {{-- /Subtitulo --}}

    {{-- Subtitulo --}}
    <br>
    <h2 class="row justify-content-center subtitulo-DS">Eventos</h2>
    <div class="row align-items-center row justify-content-center">
        <hr align="left" class="izquierda-DS ml-0 mr-2" noshade="noshade" style="width:200px;">✻
        <hr align="left" class="derecha-DS ml-2 mr-0" noshade="noshade" style="width:200px;">
    </div>
    {{-- /Subtitulo --}}

    {{-- Eventos --}}
    <div class="row justify-content-center" data-aos="fade-up" data-aos-anchor-placement="top-center">
        <img class="imagen-DS evento-DS m-3" src="{{ asset('img/eventos/evento1.jpg') }}" alt="">
        <div class="mask rgba-white-slight"></div>
    </div>
    {{-- /Eventos --}}

    <!--Footer-->
    <footer class="footer">
        <div class="container bottom_border">
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
