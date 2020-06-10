@extends('layouts.app')

@section('content')

<br>

<div class="container box is-radiusless">

    <h3 class="title is-4">Colores para bodas</h3>

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

    @include('colors.create')

    <br>

    <label class="label">Colores: </label>

    <div class="tags">

        @foreach ($colors as $color)
        <span class="tag is-danger ">
            <a class="has-text-white" href="{{ route('color.edit',$color->id) }}">{{ $color->name }}</a>
            @include('colors.delete')
        </span>
        @endforeach

    </div>
</div>

@endsection
