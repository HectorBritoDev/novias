<form action="{{ route('budget.destroy',$category->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="button is-danger" type="submit">
    	<span class="icon">
    		<i class="fas fa-times"></i>
    	</span>
    	<span>Eliminar</span>
    </button>
</form>
