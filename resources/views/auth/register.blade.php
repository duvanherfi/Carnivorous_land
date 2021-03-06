@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrarse') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <p class="text-center">Los siguientes campos son obligatorios</p>
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" placeholder="Ej: Pedro Antonio" type="text"
                                    class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                                    value="{{ old('nombre') }}" autocomplete="nombre" autofocus>

                                @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido"
                                class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellido" placeholder="Ej: Espinosa Carrillo" type="text"
                                    class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                                    value="{{ old('apellido') }}" autocomplete="apellido" autofocus>

                                @error('apellido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="correo" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="correo" placeholder="Ej: ejemplo@gmail.com" type="email"
                                    class="form-control @error('correo') is-invalid @enderror" name="correo"
                                    value="{{ old('correo') }}" autocomplete="correo">

                                @error('correo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="{{ old('password') }}" autocomplete="new-password" placeholder="*******">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirmation"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirme La Contraseña') }}</label>
                            <div class="col-md-6">
                                <input id="password_confirmation" type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" autocomplete="new-password">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cedula"
                                class="col-md-4 col-form-label text-md-right">{{ __('Número De Cédula') }}</label>

                            <div class="col-md-6">
                                <input id="cedula" placeholder="Ej: 1113693793" type="number"
                                    class="form-control  @error('cedula') is-invalid @enderror" name="cedula"
                                    value="{{ old('cedula') }}" autocomplete="cedula">
                                @error('cedula')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="telefono"
                                class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" placeholder="Ej:3315486563" type="tel"
                                    class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                    value="{{ old('telefono') }}" autocomplete="telefono">
                                @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="fecha_nacimiento"
                                class="col-md-4 col-form-label text-md-right">{{ __('Fecha De Nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_nacimiento" type="date"
                                    class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                    name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}"
                                    autocomplete="fecha_nacimiento" max="2000-01-01">
                                @error('fecha_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>

                            <div class="col-md-6">
                                <select class="custom-select form-control @error('sexo') is-invalid @enderror" id="sexo"
                                    name="sexo" value="{{ old('sexo') }}" autocomplete="sexo">
                                    <option selected value="">Escoge una opción</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                                @error('sexo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        {{--Dirección--}}
                        <div class="form-group row">
                            <label for="Departamento"
                                class="col-md-4 col-form-label text-md-right">{{ __('Departamento') }}</label>

                            <div class="col-md-6">
                                <input id="departamento" type="text"
                                    class="form-control @error('departamento') is-invalid @enderror" name="departamento"
                                    value="{{ old('departamento') }}" autocomplete="Departamento"
                                    placeholder="Ej: Valle del cauca ">
                                @error('departamento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="ciudad" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>

                            <div class="col-md-6">
                                <input id="ciudad" type="text"
                                    class="form-control @error('ciudad') is-invalid @enderror" name="ciudad"
                                    value="{{ old('ciudad') }}" autocomplete="ciudad" placeholder="Ej: Cali">
                                @error('ciudad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="barrio" class="col-md-4 col-form-label text-md-right">{{ __('Barrio') }}</label>

                            <div class="col-md-6">
                                <input id="barrio" type="text"
                                    class="form-control @error('barrio') is-invalid @enderror" name="barrio"
                                    value="{{ old('barrio') }}" autocomplete="barrio" placeholder="Ej: Petecuy">
                                @error('barrio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="direccion"
                                class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text"
                                    class="form-control @error('direccion') is-invalid @enderror" name="direccion"
                                    value="{{ old('direccion') }}" autocomplete="direccion"
                                    placeholder="Ej: Calle 13Cn # 13N40">
                                @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="button" value="registrar" class="btn botones" data-toggle="modal"
                                    data-target="#modal_confirmacion_clientes">
                            </div>
                        </div>

                        {{--Modal confirm --}}
                        <div class="modal fade" id="modal_confirmacion_clientes" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="row subtitulo-DS pt-3 w-100 m-0">
                                            <img class="" src="/img/precaucion.png" alt="Icono de precaucion"
                                                width="30">¡ADVERTENCIA!</h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Recuerde que los siguientes campos no son modificables:
                                        <ul>
                                            <li>Contraseña</li>
                                            <li>Correo</li>
                                            <li>Cédula</li>
                                            <li>Fecha de nacimiento</li>
                                            <li>Sexo</li>
                                        </ul>
                                        ¿Está seguro que desea registrarse con estos datos?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Aceptar</button>
                                        <button type="button" class="btn botones" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection