@extends('plantilla')
@section('contenido')
@php
    $ApiKey = "4Vj8eK4rloUd272L48hsrarnUA";
    $merchant_id = $_REQUEST['merchantId'];
    $referenceCode = $_REQUEST['referenceCode'];
    $TX_VALUE = $_REQUEST['TX_VALUE'];
    $New_value = number_format($TX_VALUE, 1, '.', '');
    $currency = $_REQUEST['currency'];
    $transactionState = $_REQUEST['transactionState'];
    $firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
    $firmacreada = md5($firma_cadena);
    $firma = $_REQUEST['signature'];
    $reference_pol = $_REQUEST['reference_pol'];
    $cus = $_REQUEST['cus'];
    $extra1 = $_REQUEST['description'];
    $pseBank = $_REQUEST['pseBank'];
    $lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
    $transactionId = $_REQUEST['transactionId'];

    if ($_REQUEST['transactionState'] == 4 ) {
        $estadoTx = "Transacción aprobada";
    }

    else if ($_REQUEST['transactionState'] == 6 ) {
        $estadoTx = "Transacción rechazada";
    }

    else if ($_REQUEST['transactionState'] == 104 ) {
        $estadoTx = "Error";
    }

    else if ($_REQUEST['transactionState'] == 7 ) {
        $estadoTx = "Transacción pendiente";
    }

    else {
        $estadoTx=$_REQUEST['mensaje'];
    }

@endphp
    @if (strtoupper($firma) == strtoupper($firmacreada))


	<h2>Resumen Transacción</h2>
	<table>
	<tr>
	<td>Estado de la transaccion</td>
	<td>{{ $estadoTx}}</td>
	</tr>
	<tr>
	<tr>
	<td>ID de la transaccion</td>
	<td>{{ $transactionId}}</td>
	</tr>
	<tr>
	<td>Referencia de la venta</td>
	<td><?php echo $reference_pol; ?></td>
	</tr>
	<tr>
	<td>Referencia de la transaccion</td>
	<td>{{ $referenceCode }}</td>
	</tr>
	<tr>

	@if($pseBank != null)

		<tr>
		<td>cus </td>
		<td>{{ $cus }}</td>
		</tr>
		<tr>
		<td>Banco </td>
		<td>{{ $pseBank }}</td>
		</tr>
	@endif
	<tr>
	<td>Valor total</td>
	<td>{{ number_format($TX_VALUE)}}</td>
	</tr>
	<tr>
	<td>Moneda</td>
	<td>{{ $currency }}</td>
	</tr>
	<tr>
	<td>Descripción</td>
	<td>{{ $extra1 }}</td>
	</tr>
	<tr>
	<td>Entidad:</td>
	<td>{{ $lapPaymentMethod }}</td>
	</tr>
	</table>

@else
	<h1>Error validando firma digital.</h1>
@endif
@endsection
