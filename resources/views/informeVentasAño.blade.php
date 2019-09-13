<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
        {{-- <div class="titulo_informe row justify-content-center align-items-center">
            <img class="rounded-circle my-3" src="{{ asset('img/Logo.jpg') }}" alt="Logo Carnivorous Land" width="100" height="100">
            <h1 class="row subtitulo-DS pt-3 mb-3 m-0 text-white d-inline"> &nbsp&nbspINFORME DE VENTAS DEL AÑO</h1><br>
        </div> --}}

        {{-- <div class="container">
            <table id="tabla_cantidad_productos" class="table table-hover table-condensed mt-5">
                <thead id="carrito_tabla">
                    <tr class="text-center">
                        <th>Mes</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $meses as $mes)
                    <tr>

                        <td>{{ $mes->Mes }}</td>
                        <td>{{ $mes->Valor}}</td>

                    </tr>

                    @endforeach()
                </tbody>
            </table>
        </div> --}}
        <table class="table tabla">
            <thead class="cabecera_pedidos">
                <tr>

                    <th scope="col">Meses</th>
                    <th scope="col">Valor</th>


                </tr>
            </thead>
            <tbody class="cuerpo_pedidos">
                @foreach ( $meses as $mes)
                <tr>

                    <td>{{ $mes->Mes }}</td>
                    <td>{{ $mes->Valor}}</td>

                </tr>

                @endforeach()

            </tbody>
        </table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>