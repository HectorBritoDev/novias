<form action="{{ route('albumPhoto.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="album_id" value="{{ $album->id }}">

    <div class="field is-horizontal">
    	
    	<div class="field">
    		<div class="file">
			    <label class="file-label">
			        <input class="file-input" type="file" name="photo" required>
			        <span class="file-cta">
			            <span class="file-icon">
			                <i class="fas fa-upload"></i>
			            </span>
			            <span class="file-label">
			                Cambiar Foto…
			            </span>
			        </span>
			    </label>
			</div>
    	</div>
    	<div class="field">
    		<button class="button is-success" type="submit">Agregar</button>
    	</div>

    </div>

</form>
