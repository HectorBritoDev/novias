@extends('layouts.app')

@section('content')

<br>

<div class="container box is-radiusless">
    
    <h3 class="title is-4">Categorias</h3>

    @include('styles.create')

    <br>
    
    <label class="label">Categorias:</label>
    
    <div class="tags">
        @foreach ($styles as $style)
        <span class="tag is-danger">
            <a class="has-text-white" href="{{ route('style.edit',$style->id) }}">{{ $style->name }}</a>
            @include('styles.delete')
        </span>
        @endforeach
    </div>

    
    
</div>

@endsection
