@extends('layouts.app')

@section('content')

<br>

<div class="buttons has-addons is-centered">
	<a class="button" href="{{ route('budget.index') }}">Presupuesto</a>
	<a class="button" href="{{ route('payment.index') }}">Pagos</a>
</div>

<div class="container box has-radiusless">

	<div class="columns">
		<div class="column">
			<p class="title is-4">{{ $category->name }}</p>
		</div>
		<div class="column has-text-right">
			@include('budgetCategories.delete')
		</div>
	</div>

	@include('budgetCategories.edit')

	<br>

	@include('spends.index')
</div>

<br>

@endsection
