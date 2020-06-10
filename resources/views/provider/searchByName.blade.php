<form action="{{ route('user.search') }}">
	
	<div class="field is-horizontal has-addons">
		<div class="field">
			<div class="select is-multiple">
				<select name="name" id="searchByName" size="10">
			        <option value="">Busqueda por nombre</option>
			        @foreach ($providers as $provider)
			        <option value="{{ $provider->name }}">{{ $provider->name }}</option>
			        @endforeach
			    </select>
			</div>
		</div>
		<div class="field">
			<button class="button is-small is-danger" type="submit">buscar</button>
		</div>
	</div>
	
</form>
