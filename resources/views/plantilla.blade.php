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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
            aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justificar-DS" id="navbarSupportedContent-333">
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
        <img class="ml-3 p-1" src="{{ asset('img/redes-sociales/facebook.png') }}" alt="Facebook" width="45">
        <img class="ml-2 p-1" src="{{ asset('img/redes-sociales/instagram.png') }}" alt="Instagram" width="45">
        <img class="ml-2 p-1" src="{{ asset('img/redes-sociales/youtube.png') }}" alt="Youtube" width="45">
        <img class="ml-2 p-1" src="{{ asset('img/redes-sociales/whatsapp.png') }}" alt="Whatsapp" width="45">
        <img class="ml-3 p-1" id="bordes-left-DS" src="{{ asset('img/carro.png') }}" alt="Carro" width="45">
        <span class="badge badge-primary badge-pill counter">1</span>
    </nav>
    {{-- /.Menu --}}

    <!--Carousel Wrapper-->
    <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
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
                    <p>First text</p>
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
                    <p>Secondary text</p>
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
                    <p>Third text</p>
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

    <br><br><h2 class="row justify-content-center subtitulo-DS">¿Por qué comprar con nosotros?</h2>
    <div class="row align-items-center row justify-content-center">
        <hr align="left" class="izquierda-DS ml-0 mr-2" noshade="noshade">✻
        <hr align="left" class="derecha-DS ml-2 mr-0" noshade="noshade">
    </div>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, voluptas! Earum culpa facilis odit nostrum cumque
        exercitationem delectus doloremque tenetur harum expedita illo ea modi quos nihil fuga recusandae est quidem,
        esse obcaecati accusamus assumenda sunt impedit tempore! Consequatur, sequi commodi vitae rem obcaecati
        provident animi cupiditate. Vitae deleniti voluptas animi excepturi unde iure dolor quas, voluptatem consequatur
        sint. Assumenda labore excepturi, quasi dolor aliquid odit. Recusandae non vel velit fugiat animi? Magnam modi,
        vero quidem hic iusto dolores accusantium voluptatum illo sit nostrum voluptas laborum aliquid aperiam debitis
        est? Non eum nemo molestias aliquid eos. Animi delectus quidem eum.</p>
    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio tenetur ullam, rerum alias sequi voluptatem
        aperiam facilis nemo hic sint ipsa! Eveniet, ullam voluptate praesentium minus minima fuga ducimus nam
        reiciendis architecto distinctio, maxime fugiat commodi sapiente quidem voluptates dolorum nemo at mollitia sit
        optio suscipit aspernatur ipsum! Aut quaerat iste facere, qui similique incidunt repellendus porro sunt labore
        saepe quod obcaecati libero quasi assumenda alias iusto consectetur repellat iure molestias. Culpa est tempore
        molestiae nam tenetur quia deserunt delectus debitis, aliquid, nostrum ducimus. Sed nemo dolores dolore
        praesentium fugit, velit totam similique adipisci, minus repudiandae eum harum animi? Sed dolorem corrupti culpa
        nihil saepe consequuntur. Debitis eos et id repudiandae. Aliquid accusamus quam optio eaque cupiditate
        voluptatibus minus nihil vero saepe possimus, quaerat repudiandae aspernatur nulla, exercitationem repellat
        rerum obcaecati at natus corporis eius. Aut ducimus repudiandae perspiciatis qui, quod laudantium quidem? Fugit
        fuga eos deleniti aspernatur reprehenderit alias natus reiciendis vero animi earum, hic quasi in neque ratione
        cumque voluptates repellendus laboriosam perferendis at expedita iure odit debitis? Dolorem, similique ab natus
        quasi odio vero? Vel, quaerat eum? Impedit magnam temporibus adipisci quibusdam suscipit eaque dolores delectus
        fugiat pariatur illum quos hic eligendi cumque alias laborum esse officiis maxime quasi voluptatibus, voluptas
        odio aut, incidunt perferendis perspiciatis? Beatae rerum, omnis ipsa quia iure at quas, possimus dolorum
        delectus adipisci assumenda iste nam ea blanditiis repellat expedita! Modi laboriosam, consequatur quidem a
        voluptatibus veniam porro consectetur deleniti eveniet doloribus dicta officiis fuga corporis. Dolor assumenda
        rerum optio modi veritatis nihil ipsam voluptas, neque error. Eaque mollitia, ipsum distinctio autem asperiores
        molestias veniam debitis, odio explicabo labore fugit quis inventore. Tempore ab culpa, error accusantium
        consectetur consequuntur aliquid doloribus numquam perferendis repellat esse ipsam dignissimos? Recusandae iure,
        delectus consequatur officia odio magnam totam eligendi est? Necessitatibus dolorum repellat similique sint
        beatae, temporibus adipisci placeat consequuntur ullam officiis harum dolore amet sit! Illum facilis veritatis
        laborum praesentium labore dolorum aperiam, ad sit autem architecto, nobis tempore voluptatum voluptatibus nisi
        dignissimos velit aut ullam aliquid tenetur provident! Esse ad cupiditate veniam fugiat sapiente eaque ea omnis
        eum enim, a rem corporis excepturi repellendus sint natus maiores veritatis reiciendis obcaecati nemo et eveniet
        facilis qui consectetur! Incidunt earum excepturi quisquam maxime placeat culpa voluptates fugit debitis non.
        Vitae, molestias! Consectetur sapiente, quas a iure vitae natus pariatur ab inventore? Nisi, totam illo? Alias
        voluptas necessitatibus quam ullam doloremque quia excepturi adipisci, incidunt iste aperiam, consequatur
        molestias. A repellat perspiciatis, minus saepe cumque exercitationem labore obcaecati nihil facilis fugit
        dicta, magni temporibus unde porro ullam quasi debitis illo nulla, mollitia iste. Consequatur ea in totam
        sapiente delectus quaerat nulla velit dolor veniam ipsa est voluptates aperiam cum eos reprehenderit similique
        quia officia, tempora perspiciatis aliquid aut! Unde doloremque quasi vitae dolorum quos debitis adipisci
        quaerat, dolore consequatur cum corrupti neque provident iure accusamus recusandae ut tenetur inventore ad
        deserunt quibusdam nesciunt. Adipisci praesentium voluptatibus nostrum eum magni eaque ex laborum iusto
        explicabo vel numquam eos, magnam est maxime saepe voluptates aperiam eveniet illo obcaecati.</p>

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
</body>
</html>