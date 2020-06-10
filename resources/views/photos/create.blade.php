<form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
    @csrf


    <div class="field is-horizontal has-addons">
        <div class="field">
            <div class="file">
                <label class="file-label">
                    <input class="file-input" type="file" name="photo">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Selecciona un Archivo
                        </span>
                    </span>
                </label>
            </div>
        </div>
        <div class="field">
            <button class="button" type="submit">Agregar</button>
        </div>
    </div>


</form>
