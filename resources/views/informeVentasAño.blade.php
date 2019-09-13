<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="..\public\css\style.css" rel="stylesheet">
</head>

<body>
        <div class="bg-success justify-content-center align-items-center titulo_informe" >
            <img class="rounded-circle m-3" src="..\public\img\Logo.jpg" alt="Logo Carnivorous Land" width="70" height="70">
            <h3 class="d-inline"> INFORME DE VENTAS DEL AÑO {{$Año}}</h3><br>
        </div> 

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

                    @endforeach
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