<table class="table is-bordered is-striped is-fullwidth">
    <thead class="thead">
        <td><strong>Concepto</strong></td>
        <td><strong>Costo Estimado</strong></td>
        <td><strong>Costo Final</strong></td>
        <td><strong>Pagado</strong></td>
        <td></td>
    </thead>
    <tbody class="tbody">
        @foreach ($spends as $spend)
        <tr>
            <td><a class="has-text-black" href="{{ url('spend/'.$spend->id.'/edit?id='.$category->id) }}"><strong>{{ $spend->name }}</strong></a></td>
            <td>${{ $spend->estimated_cost }}</td>
            <td>${{ $spend->final_cost }}</td>
            @if ($spend->payment)
            <td>$<a class="has-text-black" href="{{ route('payment.edit',$spend->payment->id) }}"><strong>{{ $spend->payment->amount }}</strong></a></td>
            @else
            <td>$<a class="has-text-black" href="{{ url('payment/create?id='.$spend->id) }}"><strong>0</strong></a></td>
            @endif
            <td>@include('spends.delete')</td>

        </tr>
        @endforeach
        <tr>
            <td>
                <a class="has-text-danger" href="{{ url('spend/create?id='.$category->id) }}"><strong>Nuevo +</strong></a>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Total</td>
            <td>${{ $category->total_estimated() }}</td>
            <td>${{ $category->total_final() }}</td>

            @if ($category->spends->toArray())
            <td>${{ $spend->total_pay($category->id) }}</td>
            @else
            <td>$0</td>
            @endif
        </tr>
    </tbody>

</table>
