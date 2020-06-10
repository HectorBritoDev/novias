
<form action="{{ route('weather.store') }}" method="POST">
    @csrf
    
    @if($errors->any())
        <div class="box has-text-centered">

            <h3 class="title is-4">Corrige estos errores para continuar</h3>
        
            <br>

            <ul>
                @foreach($errors->all() as $errors)
                <li>{{ $errors }}</li>
                @endforeach
            </ul>
            
        </div>
    @endif

    <label class="label">Nombre:</label>
    <div class="field is-horizontal">
        <div class="field has-addons">
            <p class="control">
                <input class="input" type="text" name="name" value="{{ old('name') }}" placeholder="Tipo de Clima" maxlength="191" required>
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
