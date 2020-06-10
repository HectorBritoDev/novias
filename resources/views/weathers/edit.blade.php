@extends('layouts.app')

@section('content')

<br>

<div class="container box is-radiusless has-text-centered">

    <p class="title">Editar</p>

    <br>

    <form action="{{ route('weather.update',$weather->id) }}" method="POST">

        @if($errors->any())
        <div class="container has-text-centered">
            <h3 class="">Corrige estos errores para continuar</h3>

            <br>

            <ul>
                @foreach($errors->all() as $errors)
                <li>{{ $errors }}</li>
                @endforeach
            </ul>    
        </div>
        
        <br>

        @endif

        @csrf
        @method('PUT')

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label" for="name">Nombre:</label>
            </div>
            <div class="field-body">
                <div class="field has-addons">
                    <p class="control">
                        <input class="input" type="text" name="name" id="" value="{{ old('name',$weather->name) }}" placeholder="Tipo de Clima" maxlength="191" required>
        
                    </p>
                    <p class="control">
                        <button class="button is-success" type="submit">Guardar</button>
                    </p>
                </div>        
            </div>
        </div>
    </form>
</div>

@endsection
