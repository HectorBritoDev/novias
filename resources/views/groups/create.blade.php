<div class="content has-text-centered">
	<p class="title is-4">Añadir Grupo de Invitados</p>
</div>

<form action="{{ route('group.store') }}" method="POST">

    @csrf

    <label class="label">Nombre</label>
    <input class="input is-" type="text" name="name" value="{{ old('name') }}" maxlength="191" placeholder="Grupo">

    <br><br>

    <button class="button is-danger" type="submit">Guardar</button>

</form>
