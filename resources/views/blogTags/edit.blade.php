<form action="{{ route('tag.update',$tag->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="field is-horizontal">
    	<div class="field">
    		<input type="text" name="name" value="{{ $tag->name }}" placeholder="Nombre de Tag" maxlength="191" required>
    	</div>
    	<div class="field">
    		<button class="button is-success" type="submit">
    			<span class="icon">
    				<i class="far fa-edit"></i>
    			</span>
    		</button>
    	</div>
    </div>
    
</form>
