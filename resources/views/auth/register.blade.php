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

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" placeholder="Ej: Pedro Antonio" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="apellido" placeholder="Ej: Espinosa Carrillo" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>

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
                                <input id="correo" placeholder="Ej: ejemplo@gmail.com" type="email" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{ old('correo') }}" required autocomplete="correo">

                                @error('correo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('contraseña') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password-confirm" required autocomplete="new-password">
                            </div>
                        </div>
                              --}}
                        <div class="form-group row">
                            <label for="cedula" class="col-md-4 col-form-label text-md-right">{{ __('Número De Cédula') }}</label>

                            <div class="col-md-6">
                                <input id="cedula" placeholder="Ej: 1113693793" type="number" class="form-control" name="cedula" required autocomplete="cedula">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Número De Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="telefono" placeholder="Ej: xxx xxx xx xx" type="tel" class="form-control" name="telefono" required autocomplete="telefono">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">{{ __('Fecha De Nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento" required autocomplete="fecha_nacimiento">
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">{{ __('Sexo') }}</label>

                            <div class="col-md-6">
                                    <select class="custom-select form-control" id="sexo" name="sexo" required autocomplete="sexo">
                                            <option selected>Escoge una opción</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                    </select>
                            </div>
                        </div>


                        {{--Dirección--}}
                        <div class="form-group row">
                                <label for="Departamento" class="col-md-4 col-form-label text-md-right">{{ __('Departamento') }}</label>

                                <div class="col-md-6">
                                    <input id="departamento" type="text" class="form-control" name="departamento" required autocomplete="Departamento" placeholder="Ej: Valle del cauca ">
                                </div>
                            </div>


                        <div class="form-group row">
                                <label for="ciudad" class="col-md-4 col-form-label text-md-right">{{ __('Ciudad') }}</label>

                                <div class="col-md-6">
                                    <input id="ciudad" type="text" class="form-control" name="ciudad" required autocomplete="ciudad" placeholder="Ej: Cali">
                                </div>
                            </div>


                        <div class="form-group row">
                                <label for="barrio" class="col-md-4 col-form-label text-md-right">{{ __('Barrio') }}</label>

                                <div class="col-md-6">
                                    <input id="barrio" type="text" class="form-control" name="barrio" required autocomplete="barrio" placeholder="Ej: Petecuy">
                                </div>
                            </div>


                        <div class="form-group row">
                                <label for="via" class="col-md-4 col-form-label text-md-right">{{ __('Vía') }}</label>

                                <div class="col-md-6">
                                    <input id="via" type="text" class="form-control" name="via" required autocomplete="via" placeholder="Ej: Calle 13Cn # 13N40">
                                </div>
                            </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn botones">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
