@extends('layouts.app')

@section('content')

<br>

<div class="columns">
    <div class="column"></div>
    <div class="column is-2 is-centered">
        <div class="field has-addons">
            <p class="control">
                <a class="button is-static" href="{{ route('budget.index') }}">Presupuesto</a>
            </p>
            <p class="control">
                <a class="button" href="{{ route('payment.index') }}">Pagos</a>
            </p>
        </div>
    </div>
    <div class="column"></div>
</div>

<br>

<div class="columns">

    <div class="column is-left"></div>
    <div class="column is-3 box is-radiusless">

        <a class="button is-fullwidth" href="{{ route('budget.pdf') }}">Descargar PDF</a>

        <br>

        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <tbody class="tbody">

                @foreach ($categories as $category)
                <tr>
                    <td><a class="has-text-black" href="{{ route('budget.show',$category->id) }}"><strong>{{ $category->name }}</strong></a></td>
                    <td>
                        <span>
                            @if ($category->total_final() !=0)
                            ${{ $category->total_final() }}
                            @else
                            ${{ $category->total_estimated() }}
                            @endif
                        </span>
                    </td>
                </tr>
                @endforeach

                <tr>@include('budgetCategories.create')</tr>
            </tbody>
        </table>

    </div>

    <div class="column is-6 box is-radiusless has-text-centered">

        <br>

        <p class="title">Mi Presupuesto</p>

        <br>

        <div class="columns">
            <div class="column">
                <div>
                    <p class="title is-6">Costo Estimado:</p>
                </div>
                <div>
                    <br>
                    <p><strong>$ {{ $global_estimated }}</strong></p>
                </div>
            </div>

            <div class="column">
                <div>
                    <p class="title is-6">Costo Final:</p>
                </div>
                <div>
                    <br>
                    <p><strong>$ {{ $global_final }}</strong></p>
                </div>

                <br>

                <div class="columns is-horizontal">
                    <div class="column">
                        <p>Total Pagado: $ {{ $global_pay }}</p>
                    </div>
                </div>

            </div>
        </div>
        @if ($global_estimated>0 && $global_final>0)

        <p class="title is-4"> Cuanto cuesta mi matrimonio?</p>

        @include('budgetCategories.chart')
        @endif
    </div>
    <div class="column is-right"></div>
</div>

@endsection
