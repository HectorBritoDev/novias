<form action="{{ route('group.update',$group->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label class="label" for="name">Nombre:</label>
    <input class="input" type="text" name="name" value="{{ old('name',$group->name) }}" maxlength="120" required>

    <br><br>

    <button class="button is-success" type="submit">Modificar</button>
    
</form>
