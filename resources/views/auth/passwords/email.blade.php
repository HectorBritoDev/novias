@extends('layouts.app')

@section('content')

<br>
<div class="columns">
    <div class="column"></div>
    <div class="column is-6 box">
        <div class="card has-text-centered">
            <div class="title is-4" class="card-header">{{ __('Reiniciar Contraseña') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="field is-horizontal">
                        <p class="field-label">
                            <label class="label" for="email" class="col-md-4 col-form-label text-md-right">Direccion de E-Mail</label>    
                        </p>
                        <p class="field-body" style="max-width: 70%">
                            <input class="input" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        </p>
                        
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                    </div>

                    <br>

                    <button class="button is-success is-outlined is-fullwidth" type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
    <div class="column"></div>
</div>

@endsection
