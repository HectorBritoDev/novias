<form action="{{ route('like.store') }}" method="POST">
    @csrf
    <input type="hidden" name="provider_id" value="{{ $provider->id }}">
    <input type="hidden" name="sector_id" value="{{ $provider->sector->id }}">
    <button class="button is-danger is-outnied" type="submit">
    	<span class="icon">
    		<i class="fas fa-heart"></i>
    	</span>
    </button>
</form>
