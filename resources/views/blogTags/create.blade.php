<form action="{{ route('tag.store') }}" method="POST">
    @csrf
    
    <div class="field is-horizontal has-addons">
    	<div class="field">
    		<input class="input" type="text" name="name" value="{{ old('name') }}" placeholder="Nombre de Tag" maxlength="191" required>
    	</div>
    	<div class="field">
    		<button class="button is-success" type="submit">
    			<span class="icon">
    				<i class="fas fa-plus"></i>
    			</span>
    		</button>
    	</div>
    </div>
    
</form>
