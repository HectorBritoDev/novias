@extends('layouts.app')

@section('content')

<br>

<div class="container box is-radiusless">

    <p class="title is-4">Editar</p>

    <form action="{{ route('color.update',$color->id) }}" method="POST">

        @if($errors->any())
        <div class="container is-fluid box is-radiusless">
            <p><strong>
                Corrige estos errores para continuar
            </strong></p>

            <ul>
                @foreach($errors->all() as $errors)
                <li>{{ $errors }}</li>
                @endforeach
            </ul>    
        </div>
        @endif

        @csrf
        @method('PUT')

        <label class="label" for="name">Nombre:</label>
        <div class="field is-horizontal has-addons">
            <p class="control">
                <input class="input" type="text" name="name" id="" value="{{ old('name',$color->name) }}" placeholder="Nombre de Color" maxlength="191" required>
            </p>
            <p class="control">
                <button class="button is-success" type="submit">Guardar</button>
            </p>
        </div>
    </form>
</div>

@endsection
