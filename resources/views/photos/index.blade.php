<div class="content has-text-centered">
	@if ($photos->count()==0)
	
		<p class="title is-4">¡No hay otras imagenes!</p>
	
	@else

	<label class="label" for="">Otras Imagenes</label>

</div>

<br>

<div class="columns is-multiline">
	@foreach ($photos as $photo)
	<div class="column is-one-quarter has-text-centered">
		<div class="card">
			<div class="card-image">
				<figure>
					<img src="{{ Storage::url($photo->photo) }}"alt="photo">
				</figure>
			</div>
			<div class="card-footer">
				<div class="card-footer-item">
					@include('photos.delete')
				</div>
			</div>
		</div>
	</div>
	@endforeach
</div>

<br>

@endif
