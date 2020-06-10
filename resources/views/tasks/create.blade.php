@if (auth()->user()->is_user)

<form class="has-text-left" action="{{ route('task.store') }}" method="POST">

    @csrf

    <div class="columns">
        <div class="column">
            <label class="label" for="title">Título: </label>
            <input class="input" type="text" name="title" maxlength="120" minlength="3" placeholder="Ejemplo: Hacer lista de Invitados"
                required>
        </div>
        <div class="column">
            <label class="label">Categoria: </label>
            <div class="select">
                <select class="" name="task_category" id="" required>
                    <option value="">Elige una</option>
                    @foreach ($task_categories as $task_category)

                    <option value="{{ $task_category->id }}">{{ $task_category->name }}</option>

                    @endforeach

                </select>
            </div>
        </div>
    </div>

    <div class="columns">
        <div class="column">
            <label class="label" for="start_date">Fecha de inicio: </label>
            <input class="input" type="date" name="start_date" value="{{ $today }}" style="max-width: 70%" required>
        </div>
        <div class="column">
            <label class="label" for="finish_date">Fecha de finalización: </label>
            <input class="input" type="date" name="finish_date" value="{{ old('finish_date') }}" style="max-width: 70%"
                required>
        </div>
    </div>

    <label class="label" for="description">Descripción: </label>
    <textarea class="textarea has-fixed-size" name="description" rows="6"></textarea>

    <br>

    <button class="button is-success is-fullwidth" type="submit">Crear</button>

</form>

@endif
