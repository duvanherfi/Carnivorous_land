<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Carnivorous Land</title>

    <!-- Styles -->

    {{-- Fuentes --}}
    {{-- Source Sans Pro --}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900&display=swap" rel="stylesheet">
    {{-- Montserrat --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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
                    <a class="nav-link waves-effect waves-light" href="{{ route('login') }}">
                        INICIAR SESIÓN
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" href="{{ route('register') }}">
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-33"
            aria-controls="navbarSupportedContent-33" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}
        <div class="collapse navbar-collapse justificar-DS" id="navbarSupportedContent-33">
            <ul class="navbar-nav ml-auto nav-flex-icons bordes-menu-DS">
                <li class="nav-item opcion-menu-DS bordes-DS">
                    <a class="nav-link waves-effect waves-light" href="{{ route('inicio') }}">
                        INICIO
                    </a>
                </li>
                <li class="nav-item bordes-DS">
                    <a class="nav-link waves-effect waves-light" href="{{ route('quienes_somos') }}">
                        ¿QUIÉNES SOMOS?
                    </a>
                </li>
                <li class="nav-item dropdown opcion-menu-DS bordes-DS">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        PRODUCTOS
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default col-4 minimenu-DS"
                        aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="#">Plantas</a>
                        <a class="dropdown-item" href="#">Implementos de cultivo</a>
                        <a class="dropdown-item" href="#">Merchandising</a>
                    </div>
                </li>
                <li class="nav-item opcion-menu-DS bordes-DS">
                    <a class="nav-link waves-effect waves-light">
                        TIPS DE CULTIVOS
                    </a>
                </li>
                <li class="nav-item opcion-menu-DS">
                    <a class="nav-link waves-effect waves-light" href="{{ route('contactanos') }}">
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
        <span class="badge badge-primary badge-pill counter">0</span>
    </nav>
    {{-- /.Menu --}}

    @yield('contenido')

    <!--Footer-->
    <footer class="footer">
        <div class="container bottom_border">
            <div class="row">
                <div class=" col-sm-4 col-md col-sm-4  col-12 col">
                    <h5 class="headin5_amrc col_white_amrc pt2">Contáctanos</h5>
                    <!--headin5_amrc-->
                    <p class="mb10">Realizamos envíos a nivel de todo Colombia</p>
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
                    <h5 class="headin5_amrc col_white_amrc pt2">Envíos</h5>
                    <p class="mb10 text-justify">Envios solo para ciudades de Colombia</p>
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
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>

</html>
