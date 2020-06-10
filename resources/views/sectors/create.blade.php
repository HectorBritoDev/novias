
<form action="{{ route('sector.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label" for="sector_name">Nombre:</label>
        </div>
        
        <div class="field-body">
            <input class="input" type="text" name="sector_name" value="{{ old('sector_name') }}" maxlength="191">
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label" for="sector_name">Categoria:</label>
        </div>
        
        <div class="field-body">
            <p class="control">
                <div class="select">
                    <select name="category_id" id="selector-category">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <p class="field">
                    <div class="file">
                        <label class="file-label">
                            <input class="file-input" type="file" name="icon">
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
                </p>
            </p>
        </div>
        
    </div>

    <button class="button is-success is-fullwidth" type="submit">Crear</button>
</form>
