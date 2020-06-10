@include('layouts.app')

<br><br>

<div class="buttons is-centered">
    <a class="button" href="{{ route('budget.show',$category_id) }}">Volver</a>
</div>

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

<section class="section">
    <div class="columns">
        <div class="column"></div>
        <div class="column is-5 box is-radiusless">
            <form action="{{ route('spend.store') }}" method="POST">
                @csrf
                <input class="input" type="hidden" name="budget_category_id" value="{{ $category_id }}">
                <label class="label" for="name">Nombre:</label>
                <input class="input" type="text" name="name" maxlength="190" required>

                <div class="columns">
                    <div class="column">
                        <label class="label" for="estimated_cost">Costo Estimado:</label>
                        <input class="input" type="number" name="estimated_cost">
                    </div>
                    <div class="column">
                        <label class="label" for="final_cost">Costo Final:</label>
                        <input class="input" type="number" name="final_cost">
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
