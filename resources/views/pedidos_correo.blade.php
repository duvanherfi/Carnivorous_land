


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos</title>


    <table>

            <tr>
                <th>Cliente</th>
                <th>Total</th>
                <th>Ciudad</th>
                <th>Dirección</th>
            </tr>
            @foreach ($pedidos as $pedido )
            <tr>
                <td>{{$pedido->nombre_cliente}}</td>
                <td>{{$pedido->total}}</td>
                <td>{{$pedido->ciudad}}</td>
                <td>{{$pedido->direccion}}</td>
            </tr>
            @endforeach

            <a href="https://www.carnivorousland.com/pedidos">Revisa tus pedidos !</a>

    </table>
 
        

  
</head>
<body>
    
</body>
</html>

