<form action="{{ route('user.search') }}" method="GET">

    <input type="hidden" name="sector" value="{{ $sector->sector_name }}" id="searcher-sector">
    <button class="button is-grey is-outlined" type="submit">
    	<span class="icon">
    		<i class="fas fa-plus"></i>
    	</span>
    	<span>
    		Añadir
    	</span>
    </button>
</form>
