@extends('layouts.app')

@section('content')

<br>

<div class="buttons is-centered">
    <a class="button" href="{{ route('budget.show',$payment->spend->budget_category_id) }}">Volver</a>
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
    <div class="container">

        <div class="columns">
            <div class="column"></div>
            <div class="column is-8 box is-radiusless">
                
                <form action="{{ route('payment.update',$payment->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="columns">
                        <div class="column">
                            <label class="label" for="amount">Importe:</label>
                            <input class="input" type="text" name="amount" value="{{ $payment->amount }}" maxlength="191">
                        </div>
                        <div class="column">
                            <label class="label" for="status">Pagado:</label>
                            <input class="checkbox" type="checkbox" name="status" @if ($payment->status ==1) checked @endif>
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column">
                            <label class="label" for="pay_date">Fecha de Pago:</label>
                            <input class="input" type="date" name="pay_date" value="{{ $payment->pay_date }}" maxlength="191" style="max-width: 60%">        
                        </div>
                        <div class="column">
                            <label class="label" for="expiration_date">Fecha de vencimiento:</label>
                            <input class="input" type="date" name="expiration_date" value="{{ $payment->expiration_date }}" style="max-width: 60%">        
                        </div>
                    </div>

                    <div class="columns">
                        <div class="column">
                            <label class="label" for="pay_by">Pagado por:</label>
                            <input class="input" type="text" name="pay_by" value="{{ $payment->pay_by }}" maxlength="191">
                        </div>
                        <div class="column">
                            <label class="label" for="pay_method">Método de pago:</label>
                            <input class="input" type="text" name="pay_method" value="{{ $payment->pay_method }}" maxlength="191">
                        </div>
                    </div>

                    <div class="buttons is-centered">
                        <button class="button is-danger is-outlined" type="submit">
                            <span>
                                Guardar
                            </span>
                        </button>
                    </div>
                    
                </form>

            </div>
            <div class="column"></div>
        </div>
        
    </div>
</section>

@endsection
