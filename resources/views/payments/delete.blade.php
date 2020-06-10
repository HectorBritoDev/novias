<form action="{{ route('payment.destroy',$payment->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="button is-danger" type="submit">
    	<span class="icon">
    		<i class="fas fa-delete"></i>
    	</span>
    	<span>Eliminar</span>
    </button>
</form>
