@extends('layouts.home')

@section('content')
<div class="contenido__contenedor">
    <div class="contenido__frase">
        Crea tu futuro, <br>
        transforma el Mundo
    </div>
    <div class="card">
        <div class="card__titulo">{{ __('Inicio de sesión') }}</div>
        <div class="card__subtitulo">{{ __('Entra con facebook o Gmail') }}</div>

        <div class="flex">
            <a href="{{ route('client::social','google') }}" class="btn btn__google">Sign in with Google</a>
            <a href="{{ route('client::social','facebook') }}" class="btn btn__facebook"><i class="fa fa-facebook"></i> Iniciar sesión con Facebook</a>
        </div>

        <form method="POST" action="{{ route('client::login') }}">

            <p class="titulo">Ingresa con tu perfil</p>

            @csrf

            <div class="form__group row">
                <label for="email" class="">{{ __('Correo electrónico') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="nombre@mail.com" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form__group row">
                <label for="password" class="">{{ __('crear contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="*****" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <a class="link link__forgot" href=" {{route('client::pass_reset:get')}} ">
                {{ __('Olvide mi contraseña') }}
            </a>

            <!-- <div class="form-group row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div> -->

            <div class="form__group">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn__login">
                        {{ __('Entrar') }}
                    </button>
                </div>
            </div>

            <a class="link link__registro" href="{{ route('client::register:get') }}">
                {{ __('¿No tienes cuenta? Regístrate aquí') }}
            </a>
        </form>

    </div>
</div>
@endsection
