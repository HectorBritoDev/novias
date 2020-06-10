@extends('layouts.app')

@section('content')

<br>

<section class="section has-text-centered">

    @if($errors->any())
    <p><strong>
            Corrige estos errores para continuar
        </strong></p>

    <ul>
        @foreach($errors->all() as $errors)
        <li>{{ $errors }}</li>
        @endforeach
    </ul>
    @endif

    <button class="button modal-button is-large" data-target="#NOMBRE" aria-haspopup="true">

        <span class="icon">
            <i class="far fa-plus-square"></i>
        </span>
        <span class="has-text-grey">Crea una tarea nueva...</span>

    </button>

    <div class="modal" id="NOMBRE">
        <div class="modal-background"></div>
        <div class="modal-content box is-radiusless">
            @include('tasks.create')
        </div>
        <button class="modal-close is-large" aria-label="close"></button>
    </div>
</section>


<br>

<div class="container box is-radiusless has-text-centered">
    <p class="title is-3">Tareas Pendientes: </p>
    @if ($tasks_incompleted->count()==0)
    No hay tareas pendientes
    @else
    @foreach ($tasks_incompleted as $task)

    <div class="container is-fluid has-text-centered">
        <div class="field has-addons has-text-centered">
            <div class="control">
                @include('tasks.status')
            </div>
            <div class="control">
                <div class="input">

                    <a class="has-text-danger" href="{{ route('task.edit',$task->id) }}"><strong>{{ $task->title }}</strong></a>
                    <p class="">, {{ $task->category->name }}</p>

                </div>
            </div>
            <div class="control">

                @include('tasks.delete')

            </div>
        </div>
    </div>

    @endforeach

    @endif
</div>

<br>

@if ($tasks_completed->count()>0)
<div class="container box is-radiusless has-text-centered">

    <p class="title is-3">Tareas Completadas: </p>

    @foreach ($tasks_completed as $task)

    <div class="field has-addons">
        <div class="control">
            @include('tasks.status')
        </div>
        <div class="control">
            <div class="input is-danger has-background-grey-lighter">

                <a class="has-text-danger" href="{{ route('task.edit',$task->id) }}"><strong>{{ $task->title }}</strong></a>
                <p class="is-black">, {{ $task->category->name }}</p>

            </div>
        </div>
        <div class="control">

            @include('tasks.delete')

        </div>
    </div>

    @endforeach
</div>
@endif

<br>

<script type="text/javascript">
    document.querySelectorAll('.modal-button').forEach(function (el) {
        el.addEventListener('click', function () {
            var target = document.querySelector(el.getAttribute('data-target'));

            target.classList.add('is-active');

            target.querySelector('.modal-close').addEventListener('click', function () {
                target.classList.remove('is-active');
            });
        });
    });

</script>

@endsection
