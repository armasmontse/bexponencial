@extends('layouts.home')

@section('content')
<div class="contenido__contenedor email">
    <div class="contenido__frase">
        Crea tu futuro, <br>
        transforma el Mundo
    </div>
    <div class="card">
        <div class="card__titulo">{{ __('Recuperación de contraseña') }}</div>
        <div class="card__subtitulo">{{ __('Para recuperar tu contraseña, ingresa el correo electrónico registrado.') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <form method="POST" action="">
            @csrf

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

            <div class="form__group">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Enviar') }}
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
