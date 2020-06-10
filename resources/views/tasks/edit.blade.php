@extends('layouts.app')

@section('content')

<br>

<div class="container box is-radiusless">
    <form action="{{ route('task.update',$task->id) }}" method="POST">

        @csrf
        @method('PUT')

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

        <div class="columns">
            <div class="column">
                <label class="label" for="title">Título:</label>
                <input class="input" type="text" name="title" maxlength="120" value="{{  old('title',$task->title) }}"
                    required>
            </div>
            <div class="column">
                <label class="label">Categoria:</label>
                <div class="select">
                    <select name="category_id" id="select-task-category" required>
                        @foreach ($task_categories as $task_category)
                        <option value="{{ $task_category->id }}">{{ $task_category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <label class="label" for="description">Descripción: </label>
        <textarea class="textarea has-fixed-size" name="description" rows="6">{{ old('description',$task->description) }}
        </textarea>

        <br>

        <div class="columns">
            <div class="column">
                <label class="label" for="start_date">Fecha de Inicio:</label>
                <input class="input" type="date" name="start_date" value="{{ old('start_date',$task->start_date) }}"
                    style="max-width: 40%">
            </div>
            <div class="column">
                <label class="label" for="finish_date">Fecha de Finalización:</label>
                <input class="input" type="date" name="finish_date" value="{{ old('finish_date',$task->finish_date) }}"
                    style="max-width: 40%">
            </div>
        </div>

        <label class="label" for="note">Nota: </label>
        <textarea class="textarea has-fixed-size" name="note" id="" cols="10" rows="2" maxlength="191">{{ $task->note }}</textarea>

        <br>

        <div class="columns">
            <div class="column is-half">
                <button class="button is-success is-fullwidth" type="submit">Guardar</button>
            </div>
            <div class="column is-half">
                <button class="button is-danger is-fullwidth" href="{{ route('task.index') }}">Cancelar</button>
            </div>
        </div>

    </form>
</div>

<br>

@endsection

@section('aditional_scripts')

<script>
    function preselected_items() {
        var category = '<?php echo $task->category_id; ?>';
        var select_task_category = document.getElementById('select-task-category');
        select_task_category.value = category;
    }
    window.addEventListener('load', preselected_items)

</script>

@endsection
