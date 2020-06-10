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

<form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="field is-horizontal">
        <div class="field">

            <div class="file">
                <label class="file-label">
                    <input class="file-input" type="file" name="main_photo" required>
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Añadir Foto…
                        </span>
                    </span>
                </label>
            </div>

        </div>
        <div class="field-label is-primary">

            <label class="label" for="name">Nombre:</label>

        </div>
        <div class="field">

            <input class="input" type="text" name="name" value="{{ old('name') }}" maxlength="120" required>

        </div>
        <div class="field-body">

            <button class="button is-success" type="submit">

                <span class="icon">
                    <i class="fas fa-plus"></i>
                </span>

            </button>
        </div>
    </div>

</form>
