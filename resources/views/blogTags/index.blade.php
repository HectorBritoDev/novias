@extends('layouts.app')

@section('content')

<section class="section">
	<div class="container box is-radiusless">
		<p class="title is-4">
			Etiquetas para Blog
		</p>

		@include('blogTags.create')

		<p><strong>
			Tags Creados:
		</strong></p>

		<br>

		<div class="tags">
			@foreach ($tags as $tag)

			<span class="tag is-danger">
				{{ $tag->name }}

				@include('blogTags.delete')
			</span>

			<br>

			@endforeach
		</div>

	</div>
</section>

@endsection
