
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
<body>
    <div class="container">


            <h2 class="row subtitulo-DS pt-3 w-100 m-0">PEDIDOS</h2><br>


            <table class="table tabla">
                <thead class="cabecera_pedidos">
                    <tr>

                    <th scope="col">Entregado</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Nombre cliente</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Estado</th>


                    </tr>
                </thead>
                <tbody class="cuerpo_pedidos">
                @foreach ( $pedidos as $pendiente)
                    <tr>

                    <td><button data-id="{{$pendiente->id}}" id="enviarr" type="button" class="btn botones" data-dismiss="modal">Entregar</button></td>
                    <td>{{$pendiente->fecha}}</td>
                    <td>{{$pendiente->nombre_cliente}}</td>
                    <td>{{$pendiente->ciudad}}</td>
                    <td>{{$pendiente->estado}}</td>
                    <td><input data-id="{{$pendiente->id}}" id="detalle_pedido" type=image src="{{ asset('img/pedidos/ver.png') }}"></td>

                    </tr>

                @endforeach()

                </tbody>
            </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>

</html>
