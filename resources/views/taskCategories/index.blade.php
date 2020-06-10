@extends('layouts.app')

@section('content')

<br>

<div class="container box is-radiusless">

    <h3 class="title is-4">Categorias para tareas</h3>

    @include('taskCategories.create')

    <br>

    <label class="label">Categorias: </label>

    <div class="tags">
        @foreach ($task_categories as $task_category)

        <span class="tag is-danger">
            <a class="has-text-white" href="{{ route('taskCategory.edit',$task_category) }}">{{ $task_category->name }}</a>
            @include('taskCategories.delete')
        </span>

        <br>

        @endforeach
    </div>

</div>

@endsection
