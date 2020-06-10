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

<form action="{{ route('budget.update',$category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="field is-horizontal has-addons">
        <p class="control">
            <input class="input" type="text" name="name" value="{{ $category->name }}" maxlength="190">
        </p>
        <p class="control">
            <button class="button is-success" type="submit">
                <span class="icon">
                    <i class="fas fa-pen"></i>
                </span>
            </button>
        </p>
    </div>
</form>
