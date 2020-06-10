@extends('layouts.app')

@section('content')

<br>

<section class="section">
    <div class="columns">
        <div class="column"></div>
        <div class="column is-8 box is-radiusless">

            <div class="columns">
                <div class="column">
                    <figure class="image">
                        <img class="" src="{{ asset('images/login.png') }}" css id="ImagenLogin">
                    </figure>
                </div>
                <div class="column has-text-centered">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images\logo.png')}}">
                    </a>

                    <br><br>

                    <p>
                        <strong>
                            Accede con tu Cuenta
                        </strong>
                    </p>

                    ¿No Dispones de Cuenta? <a class="has-text-weight-semibold has-text-danger" href="{{ url('/register') }}">Registrate</a>
                    
                    <br><br>

                    <div class="is-centered">
                        <a href="{{ route('login.social') }}" class="button is-link">Ingresa con Instagram</a>

                        <br><br>
                        <button class="button is-danger">Ingresa con tu Celular</button>
                    </div><br>

                    <p class="has-text-weight-semibold">O Accede con tu E-Mail</p>
                    <br>

                    <form method="POST" action="{{ route('login') }}">

                        @csrf
                        <div class="field">

                            <p class="control has-icons-left">
                                <input id="email" class="input" type="email" name="email" placeholder="Tu E-Mail" value="{{ old('email') }}" maxlength="191" required autofocus>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>

                                </span>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif

                        </div>
                        <div class="field">
                            <p class="control has-icons-left">
                                <input id="password" type="password" class="input" name="password" placeholder="Tu Contraseña" maxlength="191" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </p>
                            <a class="has-text-grey-light" href="{{ route('password.request') }}">¿Olvidaste tu
                                Contraseña?</a>
                        </div>

                        <br>
                        
                        <!-- <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                         <label class="form-check-label" for="remember"> Remember Me</label> -->

                        <div class="buttons is-centered">
                            <button type="submit" class="button is-danger is-outlined">
                                Acceder
                            </button>
                        </div>
                       
                        
                        ¿Eres Proveedor? <a class="has-text-black has-text-weight-semibold" href="">Accede como
                            Empresa</a>
                    </form>        
                </div>
            </div>

        </div>
        <div class="column">
        </div>
    </div>
</section>

<br>

@endsection