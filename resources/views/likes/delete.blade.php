<form action="{{ route('like.destroy',$like->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="button is-dark is-outlined" type="submit">
    	<span class="icon">
    		<i class="far fa-heart"></i>
    	</span>
    </button>
</form>
