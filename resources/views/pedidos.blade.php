@extends('plantilla')

@section('contenido')

@foreach ( $pedidos as $pedido)
<ul>
  <li>{{$pedido->id}}</li>
</ul>
@endforeach
@endsection 