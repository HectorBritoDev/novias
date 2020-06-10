@extends('layouts.app')
@section('content')

<br>

<div class="columns">
    <div class="column is-left"></div>
    <div class="column is-2 is-centered">
        <div class="buttons has-addons">
            <a class="button" href="{{ route('budget.index') }}">Presupuesto</a>
            <a class="button is-static">Pagos</a>
        </div>
    </div>
    <div class="column is-right"></div>
</div>

<br>

<div class="container box is-radiusless">
    <h1 class="title is-5">Gastos</h1>

    <div class="field is-horizontal">
        <p class="control">Mostrar: </p>
        <p class="control">
            <a class="has-text-black" href="{{ url('payment') }}"><strong>Todos</strong></a>
        </p>
        <p> | </p>
        <p class="control">
            <a class="has-text-black" href="{{ url('payment?0') }}"><strong>Pendientes</strong></a>
        </p>
        <p> | </p>
        <p class="control">
            <a class="has-text-black" href="{{ url('payment?1') }}"><strong>Pagados</strong></a>
        </p>
    </div>

    <table class="table is-fullwidth is-striped">
        <thead class="thead">
            <tr>
                <td>ESTADO</td>
                <td>GASTO</td>
                <td>DETALLES</td>
                <td></td>
                <td>IMPORTE</td>
                <td></td>
            </tr>
        </thead>
        <tbody>

            @foreach ($payments as $payment)
            <tr>
                @if ($payment->status==0)

                <td>Pendiente</td>
                @else
                <td>
                    <p><strong class="has-text-success">Pagado</strong></p>
                </td>
                @endif
                <td>
                    <a class="has-text-black" href="{{ route('budget.show', $payment->budget_category_id) }}">
                        <strong>{{ $payment->name }}</strong>
                    </a>
                </td>
                <td>
                    @if ($payment->pay_date)
                    Pagado el: {{ $payment->pay_date }}
                    @endif

                    <br>

                    @if ($payment->pay_by)
                    Pagado por: {{ $payment->pay_by }}
                    @endif

                </td>
                <td>
                    Vence el: {{ $payment->expiration_date }}
                    <br>
                    @if ($payment->pay_method)
                    Medio:{{ $payment->pay_method }}
                    @endif
                </td>
                <td> ${{ $payment->amount }}</td>
                <td>
                    <div class="buttons has-addons">
                        <a class="button" href="{{ route('payment.edit_alternative',$payment->id) }}">Editar</a>
                        @include('payments.delete')
                    </div>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>



<br>

@endsection
