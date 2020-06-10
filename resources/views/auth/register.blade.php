@extends('layouts.app')

@section('content')


<br>

<div class="columns has-addons">
    <div class="column is-left"></div>
    <div class="column is-8 is-centered box is-radiusless">

        <div class="columns is-gapless">
            <div class="column is-half">

                <img class="" src="{{ asset('images/login.png') }}" css id="ImagenLogin">

            </div>

            <div class="column is-half">

                <a href="{{ route('home') }}">
                    <img src="{{ asset('images\logo.png')}}">
                </a>

                <br><br>

                <form method="POST" action="{{ route('register') }}">
                    @if (!empty($instagram_user))
                    <input type="hidden" name="nickname" value="{{ $instagram_user->getNickname() }}">
                    <input type="hidden" name="avatar" value="{{ $instagram_user->getAvatar() }}">
                    @endif
                    <p>
                        @csrf
                        @if (!empty($instagram_user))
                        <input id="name" type="text" class="input" name="name" value="{{ $instagram_user->getName() }}" maxlength="191" placeholder="Nombre" required autofocus>
                        @else

                        <input id="name" type="text" class="input" name="name" value="{{ old('name' ) }}" placeholder="Nombre" maxlength="191" required autofocus>
                        @endif

                        @if ($errors->has('name'))
                        <span class="" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </p>
                    <br>
                    <p class="control has-icons-left">
                        @if (!empty($instagram_user))
                        <input id="email" type="email" class="input" name="email" value="{{ $instagram_user->getEmail() }}" maxlength="191" placeholder="Email" required>

                        @else

                        <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" maxlength="191" placeholder="Email" required>
                        @endif

                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>

                        @if ($errors->has('email'))
                        <span class="" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </p>
                    <br>
                    <p class="control has-icons-left">
                        <input id="password" type="password" class="input" name="password" placeholder="Contraseña" maxlength="191" required>

                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>

                        @if ($errors->has('password'))
                        <span class="" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </p>
                    <br>
                    <p class="control has-icons-left">
                        <input id="password-confirm" type="password" class="input" name="password_confirmation" maxlength="191" placeholder="Confirmar Contraseña" required>

                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </p>

                    <br>

                    {{-- <div class="field is-horizontal">
                        <div class="field-label is-normal">
                            <label class="label" for="marrige_date" class="">Fecha de Matrimonio</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input" id="marrige_date" type="date" class="date" name="marrige_date"
                                        value="" required autofocus>
                                </p>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('marrige_date'))
                    <span class="" role="alert">
                        <strong>{{ $errors->first('marrige_date') }}</strong>
                    </span>
                    @endif --}}

                    <div class="field is-horizontal">
                        <p class="field-label">
                            <label class="label" for="role" class="">
                                <strong>Soy:</strong>
                            </label>
                        </p>
                        <p class="field-body">
                            <input class="radio" id="" type="radio" class="" name="role" value="1"
                                required autofocus checked>
                            Usuario
                        </p>
                        <p class="field-body">
                            <input class="radio" id="" type="radio" class="" name="role" value="2"
                                required autofocus>
                            Empresa
                        </p>

                    </div>

                    @if ($errors->has('role'))
                    <span class="" role="alert">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                    @endif

                    <br>

                    <label class="label" for="departamento">Ubicación:</label>

                    <div class="field has-addons">
                        <p class="field-body">
                            <div class="select" style="max-width: 60%;">
                                <select name="departamento" id="select-departamento" required>
                                    <option value="">Departamento</option>
                                    @foreach ($departamentos as $departamento)

                                    <option value="{{ $departamento->id_departamento }}">{{
                                $departamento->departamento }}</option>

                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('departamento'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('departamento') }}</strong>
                            </span>
                            @endif  
                            <div class="select" style="max-width: 40%;">
                                <select name="municipio" id="select-municipio" required>
                                    <option value="">Municipo</option>
                                </select>
                            </div>
                            @if ($errors->has('municipio'))
                            <span class="" role="alert">
                                <strong>{{ $errors->first('municipio') }}</strong>
                            </span>
                            @endif
                        </p>

                        <div class="field-body">
                            
                        </div>
                    </div>
                    
                    <br>

                    <div class="has-text-centered">
                        <button type="submit" class="button is-danger is-outlined is-fullwidth">Registrarse</button>

                        <br>
                        ¿Ya tienes cuenta? <a class="has-text-black" href="{{ route('login') }}"><strong>Acceder</strong></a>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="column is-right"></div>
</div>

@endsection

@section('aditional_scripts')
<script src="{{ asset('js/depending_selectors.js') }}"></script>
@endsection
