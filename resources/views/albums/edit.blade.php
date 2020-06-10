<form action="{{ route('album.update',$album->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="column">
        <div class="card">
            <div class="card-image">
                <figure class="image">
                    <img src="{{ Storage::url($album->main_photo) }}" alt="main-photo">
                </figure>
            </div>
            <div class="card-title">

                <br>

                <div class="field is-horizontal">
                    <div class="field-label is-primary">
                        <label for="" class="label">
                            Nombre:
                        </label>
                    </div>
                    <div class="field-body">
                        <input class="input" type="text" name="name" value="{{ $album->name }}" style="max-width: 89%" maxlength="191" required>
                    </div>
                </div>

            </div>

            <br>

            <div class="content">
                <div class="field is-horizontal">
                    <div class="field-label">
                        <label for="" class="label">
                            Cambiar Foto de Portada:
                        </label>
                    </div>

                    <div class="field-body" style="max-width: 60%">
                        <div class="file">
                            <label class="file-label">
                                <input class="file-input" type="file" name="main_photo">
                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label">
                                        Cambiar Foto…
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <div class="card-footer-item">
                    <a class="button" href="{{ route('album.index') }}">Volver</a>
                </div>
                <div class="card-footer-item">
                    <button class="button is-danger" type="submit">Modificar</button>
                </div>
            </div>
        </div>
    </div>
    
    
    <br>
    
</form>

