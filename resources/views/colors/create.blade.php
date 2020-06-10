<form action="{{ route('color.store') }}" method="POST">
    @csrf

    <label class="label">Nombre: </label>

    <div class="field is-horizontal">
        <div class="field has-addons">
            <p class="control">
                <input class="input" type="text" name="name" value="{{ old('name') }}" placeholder="Nombre de Color" maxlength="191" required>
            </p>
            <p class="control">
                <button class="button is-success" type="submit">
                    <span class="icon">
                        <i class="fas fa-plus"></i>
                    </span>
                </button>
            </p>
        </div>
    </div>

</form>
