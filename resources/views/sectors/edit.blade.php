<form action="{{ route('sector.update',$sector->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-images">
            <figures class="image is-square">
                <img src="{{ Storage::url($sector->icon) }}" alt="icon">
            </figures>
        </div>
        <div class="card-content has-text-centered">
            <div class="file">
                <label class="file-label">
                    <input class="file-input" type="file" name="icon">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Cambiar Icono
                        </span>
                    </span>
                </label>
            </div>
            <br>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="sector_name">Nombre:</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input" type="text" name="sector_name" value="{{ $sector->sector_name }}"
                                required>
                        </p>
                    </div>
                </div>
                <div class="field-label is-normal">
                    <label class="label">Categoría:</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <div class="select">
                                <select name="category_id" id="selector-category">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == $sector->category_id)
                                        selected
                                        @endif>{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="card-footer-item">
                <button class="button is-success is-fullwidth" type="submit">Guardar</button>
            </div>
        </div>
    </div>

</form>
