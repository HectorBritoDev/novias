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

<form action="{{ route('faq.store') }}" method="POST">
    @csrf

    <div class="field is-horizontal has-text-left">
        <div class="field-label">
            <label class="label" for="question">Pregunta</label>
        </div>
        <div class="field-body">
            <input class="input" type="text" name="question" value="{{ old('question') }}" maxlength="150" required>
        </div>
        <div class="field-label">
            <label class="label" for="answer">Respuesta</label>
        </div>
        <div class="field-body has-addons">
            <input class="input" type="text" name="answer" value="{{ old('answer') }}" maxlength="190" required>
            <button class="button is-success" type="submit">Guardar</button>
        </div>
    </div>

</form>
