<br>

<p class="title">Menu</p>

<form action="{{ route('menu.store') }}" method="POST">
    @csrf

    <div class="field is-horizontal">

        <div class="field-label is-normal">
            <label class="label" for="name">Nombre</label>
        </div>
        <div class="field-body">
            <div class="field">
                <p class="control">
                    <input class="input" type="text" name="name" value="{{ old('name') }}" maxlength="191">
                </p>
            </div>
        </div>
    </div>

    <div class="field is-horizontal">

        <div class="field-label is-normal">
            <label class="label" for="description">Descripción</label>
        </div>
        <div class="field-body">
            <div class="field">
                <textarea class="textarea has-fixed-size" maxlength="191" name="description">{{ old('description') }}</textarea>
            </div>
        </div>

    </div>

    <button class="button is-danger is-outlined is-fullwidth" type="submit">Crear</button>

</form>
