@extends('layouts.home')

@section('content')
<div class="contenido__contenedor">
    <div class="contenido__frase">
        Crea tu futuro, <br>
        transforma el Mundo
    </div>
    <div class="card">
        <div class="card__titulo">{{ __('Registro') }}</div>
        <div class="card__subtitulo">{{ __('¡regístrate con facebook o Gmail!') }}</div>

        <div class="flex">
            <a href="{{ route('client::social','google') }}" class="btn btn__google"><i class="fa fa-github"></i>Sign in with Google</a>
            <a href="{{ route('client::social','facebook') }}" class="btn btn__facebook"><i class="fa fa-facebook"></i> Iniciar sesión con Facebook</a>
        </div>

        <form method="POST" action="{{ route('client::register:get') }}">

            <p class="titulo">ingresa con tu dirección de correo electrónico</p>

            @csrf

            <div class="form__group row">
                <label for="name" class="">{{ __('Nombre Completo') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="names" placeholder="Nombre Apellido Apellido" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form__group row">
                <label for="email" class="">{{ __('Correo electrónico') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="nombre@mail.com" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form__group row">
                <label for="password" class="">{{ __('Crear Contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="*****" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form__group row">
                <label for="password-confirm" class="">{{ __('Repetir contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="*****" required>
                </div>
            </div>

            <div class="form__group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="terminos" for="remember">
                            {{ __('Acepto que he leído los Términos y condiciones, el Aviso de privacidad y la Política de datos de navegación') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form__group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Únete') }}
                    </button>
                </div>
            </div>

            <a class="link link__registro" href="{{ route('client::login') }}">
                {{ __('¿¿Ya tienes cuenta? Inicia sesión aqui') }}
            </a>
        </form>
    </div>
</div>
@endsection
