@extends('layouts.app')
@section('content')

<br>

<div class="buttons is-centered">
    <a class="button" href="{{ route('budget.show',$spend->budget_category_id) }}">Volver</a>
</div>

@if($errors->any())

<section class="section">
    <div class="container is-fluid box is-radiusless">
        <p><strong>
            Corrige estos errores para continuar
        </strong></p>
        <ul>
            @foreach($errors->all() as $errors)
            <li>{{ $errors }}</li>
            @endforeach
        </ul>        
    </div>
</section>

@endif

<section class="section">

    <div class="columns">
        <div class="column"></div>
        <div class="column is-8 box is-radiusless">
            <form action="{{ route('payment.store') }}" method="POST">
                @csrf

                <input type="hidden" name="spend_id" value="{{ $spend->id }}">
                <input type="hidden" name="name" value="{{ $spend->name }}">

                <div class="columns">
                    <div class="column">
                        <label class="label" for="amount">Importe:</label>
                        <input class="input" type="text" name="amount" value="{{ old('ammount') }}" maxlength="191" style="max-width: 50%">
                    </div>
                    <div class="column">
                        <label class="label" for="status">Pagado:</label>
                        <input class="checkbox" type="checkbox" name="status" maxlength="191" checked>
                    </div>
                </div>

                <div class="columns">
                    <div class="column">
                        <label class="label" for="pay_date">Fecha de Pago:</label>
                        <input class="input" type="date" name="pay_date" style="max-width: 50%">
                    </div>
                    <div class="column">
                        <label class="label" for="expiration_date">Fecha de vencimiento:</label>
                        <input class="input" type="date" name="expiration_date" value="{{ $today  }}" required style="max-width: 50%">
                    </div>
                </div>

                <div class="columns">
                    <div class="column">
                        <label class="label" for="pay_by">Pagado por:</label>
                        <input class="input" type="text" name="pay_by" value="{{ old('pay_by') }}" maxlength="191" style="max-width: 50%">
                    </div>
                    <div class="column">
                        <label class="label" for="pay_method">Método de pago:</label>
                        <input class="input" type="text" name="pay_method" value="{{ old('pay_method') }}" maxlength="191" style="max-width: 50%">
                    </div>
                </div>

                <div class="buttons is-centered">
                    <button class="button is-danger is-outlined" type="submit">Guardar</button>
                </div>

                
            </form>
        </div>
        <div class="column"></div>
    </div>
    
</section>
@endsection
