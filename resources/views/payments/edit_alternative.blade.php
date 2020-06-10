@extends('layouts.app')

@section('content')


<br>

<div class="buttons is-centered">
    <a class="button" href="{{ route('payment.index') }}">Volver</a>
</div>

<br>

<section class="section">
    @if($errors->any())
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
    @endif
    <div class="container box is-radiusless">
        <form action="{{ route('payment.update_alternative',$payment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="field is-horizontal">

                <p class="field-label is-primary">
                    <label class="label" for="amount">Importe:</label>
                </p>
                <p class="field">
                    <input class="input" type="text" name="amount" value="{{ $payment->amount }}" maxlength="191">
                </p>
                <p class="field-label is-primary">
                    <label class="label" for="status">Pagado</label>
                </p>
                <p class="field-body">
                    <input class="checkbox" type="checkbox" name="status" @if ($payment->status ==1)
                    checked
                    @endif>
                </p>
            </div>


            <div class="columns">
                <div class="column">
                    <label class="label" for="pay_date">Fecha de Pago:</label>
                    <input class="input" type="date" name="pay_date" value="{{ $payment->pay_date }}" style="max-width: 35%;">
                </div>
                <div class="column">

                    <label class="label" for="expiration_date">Fecha de vencimiento</label>
                    <input class="input" type="date" name="expiration_date" value="{{ $payment->expiration_date }}"
                        style="max-width: 35%;">
                </div>
            </div>

            <div class="columns">
                <div class="column">
                    <label class="label" for="pay_by">Pagado por</label>

                    <input class="input" type="text" name="pay_by" value="{{ $payment->pay_by }}" placeholder="Ejmplo: Juan, Maria, Jose..."
                        maxlength="191" style="max-width: 70%;">
                </div>
                <div class="column">
                    <label class="label" for="pay_method">Método de pago</label>
                    <input class="input" type="text" name="pay_method" value="{{ $payment->pay_method }}" placeholder="Ejemplo: Credito, Transferencia, Debito..."
                        maxlength="191" style="max-width: 70%;">
                </div>

            </div>

            <div class="buttons is-centered">
                <button class="button is-danger is-outlined" type="submit">Guardar</button>
            </div>
        </form>

    </div>
</section>

@endsection
