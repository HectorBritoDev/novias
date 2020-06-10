<form action="{{ route('taskCategory.store') }}" method="POST">
    @csrf
    
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

    <label class="label">Nombre: </label>
    <div class="field is-horizontal">
        <div class="field has-addons">
            <p class="control">
                <input class="input" type="text" name="name" value="{{ old('name') }}" placeholder="Nombre de Categoria" maxlength="191" required>
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
