@extends('layouts.app')

@section('content')

<br>

<div class="container box is-radiusless">
    
    <p class="title is-4">Clima para las Bodas</p>

    @include('weathers.create')

    <br>
    
    <label class="label">Climas:</label>

    <div class="tags">
    @foreach ($weathers as $weather)

        <span class="tag is-danger">
            <a class="has-text-white" href="{{ route('weather.edit',$weather->id) }}">{{ $weather->name }}</a>
            @include('weathers.delete')
        </span>

        <br>

    @endforeach    
    </div>
    
</div>

@endsection
