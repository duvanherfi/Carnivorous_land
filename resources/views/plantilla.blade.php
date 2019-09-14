<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Carnivorous Land</title>
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



    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">



</head>


<body>
    <div id="app3">
        <boton-arriba></boton-arriba>
    </div>
    <!--Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-DS lol">
        <a class="navbar-brand sincursor-DS" href="#">¡Bienvenido a Canivorous Land, déjate atrapar!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
            aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if (!isset($estadoTx))
        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">

            <ul class="navbar-nav ml-auto bordes-externo-DS">
                @if (auth()->user() == null)
                @elseif (auth()->user()->rol == 'administrador')
                <div id="app4">
                    <anuncio-stock-min></anuncio-stock-min>
                </div>
                @endif
                <li class="nav-item bordes-DS bordes-izq-DS">
                    <p class="nav-link">
                        <i class="fab fa-whatsapp"></i>
                        +57 316 7973829
                    </p>
                </li>
                @if(auth()->user() == null)
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


                @else

                <li class="nav-item dropdown text-uppercase datos_usuario">
                    <a class="nav-link dropdown-toggle pl-5 pr-5 pb-1 href=" producto" id="navbarDropdownMenuLink-333"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fas fa-user-alt"></i> {{ auth()->user()->nombre }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default col-4 minimenu-DS"
                        aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="{{route('mis_datos')}}">
                            <img src="{{ asset('img/user.png') }}" alt="Icono de usuario" width="23">
                            Mi perfil</a>
                        @if (auth()->user()->rol == 'administrador')
                        <a class="dropdown-item" href="{{route('registrar_admin')}}">
                            <img src="{{ asset('img/admin.png') }}" alt="Icono de registrar administrador" width="23">
                            Crear admin</a>
                        @endif

                        <a class="dropdown-item" data-toggle="modal" data-target="#confirm">
                            <img src="{{ asset('img/logout.png') }}" alt="Cerrar Sesión" width="23">
                            Cerrar sesión</a>
                    </div>
                </li>



                @endif
            </ul>
        </div>


        @endif
    </nav>



    <!--/.Navbar -->
 {{--Modal confirm --}}
         <div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h2 class="row subtitulo-DS pt-3 w-100 m-0">
                        <img class="" src="/img/precaucion.png" alt="Icono de precaucion" width="30">¡ADVERTENCIA!</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    ¿Está seguro que desea cerrar la sesión?
                </div>
                <div class="modal-footer">
                     <a href="{{ route('cerrar_sesion') }}" class="btn btn-success">Aceptar</a>
                  <button type="button" class="btn botones" data-dismiss="modal">Cancelar</button>
                </div>
              </div>
            </div>
          </div>

    @if (!isset($estadoTx))
    <div class="container">
        {{-- Logo --}}
        <div>
            <img class="logo" src="{{ asset('img/Logo.jpg') }}" alt="Logo Carnivorous Land">
        </div>
        {{-- /Logo --}}
        {{-- Menu --}}

        <nav class="navbar navbar-expand-lg navbar-dark div2 row align-items-md-center menu">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-33"
            aria-controls="navbarSupportedContent-33" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}
            <div id="app2" class="collapse navbar-collapse justificar-DS" id="navbarSupportedContent-33">

                <menu_prueba> </menu_prueba>


            </div>

            <div class="redes-sociales-compra d-flex align-items-md-center justify-content-end">
                <a href="https://www.facebook.com/CarnivorousLandPlantasCarnivorasColombia/?epa=SEARCH_BOX"
                    target="_blank">
                    <img class="p-1" src="{{ asset('img/redes-sociales/facebook.png') }}" alt="Facebook" width="45">
                </a>
                <a href="https://www.instagram.com/carnivorousland" target="_blank">
                    <img class="ml-2 p-1" src="{{ asset('img/redes-sociales/instagram.png') }}" alt="Instagram"
                        width="45">

                </a>
                <a href="https://www.youtube.com/channel/UC-HHD-jISuSeqQnGylaow1w" target="_blank">
                    <img class="ml-2 p-1" src="{{ asset('img/redes-sociales/youtube.png') }}" alt="Youtube" width="45">
                </a>

                <a href="https://api.whatsapp.com/send?phone=573167973829" target="_blank">
                    <img class="ml-2 p-1" src="{{ asset('img/redes-sociales/whatsapp.png') }}" alt="Whatsapp"
                        width="45">
                </a>
                @php
                $cantidad = Session::get('cantidad');
                @endphp
                @if(auth()->user()==null)
                <a href="{{ route('carrito') }}" class="position-relative">
                    <img class="bordes-left-DS ml-3" id="añadirCarrito" src="{{ asset('img/carro.png') }}" alt="Carro"
                        data-placement="bottom" data-toggle="popover" data-content="Producto añadido al carrito">
                    <span id="contadorCarrito" class="badge badge-primary badge-pill counter position-absolute"
                        style="z-index:4; top:14%; right:2%;"><?= $cantidad?></span>
                </a>
                @elseif(auth()->user()->rol=='cliente')
                <a href="{{ route('carrito') }}" class="position-relative d-flex justify-content-center" style="">
                    <img class="bordes-left-DS ml-3 col pr-0" id="añadirCarrito" src="{{ asset('img/carro.png') }}" alt="Carro"
                        data-placement="bottom" data-toggle="popover" data-content="Producto añadido al carrito" style="right:6px;">
                    <span id="contadorCarrito" class="badge badge-primary badge-pill counter position-absolute"
                        style="z-index:4; right:0px;"><?= $cantidad?></span>
                </a>
                @endif

            </div>



        </nav>
        {{-- /.Menu --}}
    </div>
    @endif

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
                <li class="pl-0"><a
                        href="https://www.facebook.com/CarnivorousLandPlantasCarnivorasColombia/?epa=SEARCH_BOX"
                        target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://www.instagram.com/carnivorousland" target="_blank"><i
                            class="fab fa-instagram"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UC-HHD-jISuSeqQnGylaow1w" target="_blank"><i
                            class="fab fa-youtube"></i></a></li>
                <li><a href="https://api.whatsapp.com/send?phone=573167973829" target="_blank"><i
                            class="fab fa-whatsapp"></i></a></li>
            </ul>
            <!--social_footer_ul ends here-->
        </div>
    </footer>
    {{-- Footer --}}
    <!-- Scripts -->
    @routes
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('script')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".tabla").DataTable({


                "language": {
                    "info": "_TOTAL_ registros",
                    "search": "Buscar",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior",
                    },
                    "lengthMenu": 'Mostrar <select>'+
                                '<option value="10">10</option>'+
                                '<option value="30">30</option>'+
                                '<option value="-1">Todos</option>'+
                                '</select> registros',

                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "emptyTable": "No hay datos...",
                    "zeroRecords": "No hay coincidencias",
                    "infoEmpty": "",
                    "infoFiltered": "",
                }
            });

        } );


        jQuery(document).on("click", "#detalle_pedido", function(){

            var url = '/pedidos/'+$(this).attr('data-id');
            $.ajax({

                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: 'POST',
                dataType: 'JSON',


                url: url,
                    success: function(result){
                        // console.log(result.success);





                        for (i=0 ; i<5; i++){

                        $('#articulo_name'+[i]).html("");
                        $('#cantidad'+[i]).html("");
                        $('#tamaño'+[i]).html("");
                        $('#valor'+[i]).html("");
                        $('#imagen'+[i]).html("");

                        }



                        $('#modal_pedidos').modal('show');


                        $('#referencia').html(result.success[0].referencia);
                        $('#nombre_cli').html(result.success[0].nombre_cliente);
                        $('#cedula').html(result.success[0].cedula);
                        $('#telefono').html(result.success[0].telefono);
                        $('#ciudad').html(result.success[0].departamento + ', ' + result.success[0].ciudad + ', ' + result.success[0].barrio);
                        $('#direccion').html(result.success[0].direccion);
                        $('#estado').html(result.success[0].estado);
                        $('#total').html(result.success[0].total);




                        for (i=0 ; i<result.success.length; i++){

                        $('#articulo_name'+[i]).html(result.success[i].nombre_articulo);
                        $('#cantidad'+[i]).html(result.success[i].cantidad);
                        $('#tamaño'+[i]).html(result.success[i].tamaño);
                        $('#valor'+[i]).html(result.success[i].valor);
                        $('#imagen'+[i]).html(result.success[i].imagen);

                        }



                    },
                    error: function (result){
                        //  console.log(result)
                    }
            })
        })



        jQuery(document).on("click", "#enviarr", function(){

            var url = '/pedidos/'+$(this).attr('data-id');

            $.ajax({

                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                method: 'PUT',
                dataType: 'JSON',


                url: url,
                    success: function(result){
                        // console.log(result.success);

                        name = result.success.nombre_cliente;

                        alert("El pedido de " + name + " fue enviado a la lista de entregados exitosamente");

                        location.reload();


                    },
                    error: function (result){
                        //  console.log(result)
                    }
            })
        })

    </script>


</body>

</html>
