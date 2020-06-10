@extends('layouts.app')

@section('content')

<br>

<div class="column has-text-centered">
    <a class="button" href="{{ route('guest.index') }}">Volver</a>        
</div>

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

<br>

<div class="columns">
    <div class="column is-left"></div>
    <div class="column is-5 is is-centered box">

        <div class="field is-horizontal">
            <p class="field-label">
                <h1 class="title is-4">{{ $menu->name }}</h1>
            </p>
            <p class="field-body">
                @include('menus.delete') 
            </p>
        </div>

        

        <form action="{{ route('menu.update',$menu->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="field is-horizontal">
                <p class="field-label">
                    <label class="label" for="name">Nombre</label>
                </p>
                <p class="field-body">
                    <input class="input" type="text" name="name" value="{{ old('name',$menu->name) }}" maxlength="191">
                </p>
            </div>
            <div class="field is-horizontal">
                <p class="field-label">
                    <label class="label" for="description">Descripción</label>
                </p>
                <p class="field-body">
                    <textarea class="textarea has-fixed-size" name="description" maxlength="191">{{ old('description',$menu->description) }}</textarea>
                </p>
            </div>

            <button class="button is-danger is-outlined is-fullwidth" type="submit">Modificar</button>
        </form>
        
    </div>
    <div class="column is-right"></div>
</div>


@endsection