@include('layouts.app')

<div class="section">

    <div class="container">

        <div class="columns">
            <div class="column"></div>
            <div class="column is-4">
        
                <form action="{{ route('spend.update',$spend->id) }}" method="POST">
            
                    <div class="card">
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

                        <div class="card-content">
                            <input type="hidden" name="budget_category_id" value="{{ $category_id }}">

                            <label class="label" for="name">Nombre</label>
                            <input class="input" type="text" name="name" value="{{ old('name',$spend->name) }}" maxlength="191" required>

                            <br><br>

                            <label class="label" for="estimated_cost">Costo Estimado</label>
                            <input class="input" type="number" name="estimated_cost" value="{{ $spend->estimated_cost }}" maxlength="11">

                            <br><br>

                            <label class="label" for=" final_cost">Costo Final</label>
                            <input class="input" type="number" name="final_cost" value="{{ $spend->final_cost }}" maxlength="11">

                            <br><br>

                            <div class="buttons is-centered">
                                <button class="button is-danger is-outlined" type="submit">Modificar</button>
                            </div>
                            
                        </div>

                        <div class="card"></div>
                    </div>

                    @csrf
                    @method('PUT')

                </form>        


            </div>
            <div class="column"></div>
        </div>
        
    </div>
    
</div>



