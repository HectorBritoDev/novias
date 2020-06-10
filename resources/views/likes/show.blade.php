@extends('layouts.app')

@section('content')

<br>

<div class="container">
	<div class="columns is-multiline">
		@foreach ($providers as $provider)
		<div class="column is-one-fifth">
			<div class="card">
				<div class="card-image">
					<img src="{{ Storage::url($provider->provider_logo) }}" alt="logo">
				</div>
				<div class="card-content has-text-centered">
					<a class="has-text-black" href="{{ route('user.show',$provider->id .'?provider') }}"><strong>
						 {{ $provider->name }}
					</strong></a>
				</div>
			</div>
			
			
			<br>
		</div>
		@endforeach
	</div>
</div>

@endsection
