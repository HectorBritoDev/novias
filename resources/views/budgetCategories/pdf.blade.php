<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">


        <title>Document</title>
    </head>

    <body>
        <h1>Presupuesto</h1>

        <h3>
            Estimado: {{ $global_estimated }}
        </h3>
        <h3>
            Pagado: {{ $global_final }}
        </h3>
        <h3>
            Final:{{ $global_pay }}
        </h3>

        @foreach ($categories as $category)
        <h4>

            {{ $category->name }}
        </h4>

        <table class="table">
            <thead>
                <tr class="is-selected">
                    <th>Gasto</th>
                    <th>Estimaho</th>
                    <th>Final</th>
                    <th>Pagado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category->spends as $spend)
                <tr>
                    <td>
                        {{ $spend->name }}
                    </td>
                    <td>
                        {{ $spend->estimated_cost }}
                    </td>
                    <td>
                        {{ $spend->final_cost }}
                    </td>
                    @if ($spend->payment)
                    <td>
                        {{ $spend->payment->amount}}
                    </td>
                    @else
                    <td>
                        0
                    </td>
                    @endif
                </tr>
                @endforeach
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

        @endforeach
    </body>

</html>
