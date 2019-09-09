@extends('plantilla')
@section('contenido')
<div id="app" class="container mt-4 carrito w-75">
	<h2 class="row justify-content-center subtitulo-DS w-100 m-0">CALIFICA TUS PRODUCTOS</h2>
	<div class="row align-items-center row justify-content-center w-100 m-0">
		<hr class="izquierda-DS ml-0 mr-2" style="width:200px;">✻
		<hr class="derecha-DS ml-2 mr-0" style="width:200px;">
	</div>
	<div class="d-flex justify-content-center">
		<p class="text-center w-50">Si desea calificar todos sus productos con el mismo puntaje hazlo en la siguiente
			tabla, sino califica cada producto en la segunda tabla.</p>
	</div>
	<a class="btn btn-success m-0 mb-2" onclick="hacerFlush()" href="{{ route('inicio') }}"><i class="fas fa-angle-left"></i> Volver al inicio</a>
	<filas-pagrespuesta estado="{{ $estadoTx }}"></filas-pagrespuesta>
</div>
@section('script')
	<script>
		function hacerFlush(){
			const params = {
				'hacerFlush': 'flush'
			}
			axios.post('/calificarControl', params).then(response => {
                // console.log(response.data);
            })
		}
	</script>
@endsection
@endsection