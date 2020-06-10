@if($errors->any())

<div class="column is-fluid box is-radiusless">

    <p><strong>
            Corrige estos errores para continuar
        </strong></p>

    <ul>
        @foreach($errors->all() as $errors)
        <li>{{ $errors }}</li>

        <br>

        @endforeach
    </ul>

</div>

@endif

<form action="{{ route('budget.store') }}" method="POST">
    @csrf

    <div class="field is-horizontal">
        <div class="field">
            <button class="button is-danger is-outlined" type="submit">
                <span class="icon is-small">
                    <i class="fas fa-plus"></i>
                </span>
            </button>
        </div>
        <div class="field-body">
            <input class="input" type="text" name="name" value="{{ old('name') }}" maxlength="190" placeholder="Nuevo Gasto"
                required>
        </div>
    </div>

</form>
