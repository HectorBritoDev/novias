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

<form action="{{ route('faq.update',$faq->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label" for="question">Pregunta:</label>
        </div>
        <div class="field-body">
            <div class="field">
                <p class="control">
                    <input class="input" type="text" name="question" value="{{ $faq->question }}" maxlength="150"
                        required>
                </p>
            </div>
        </div>
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label" for="answer">Respuesta:</label>
        </div>
        <div class="field-body">
            <div class="field">
                <p class="control">
                    <input class="input" type="text" name="answer" value="{{ $faq->answer }}" maxlength="190" required>
                </p>
            </div>
        </div>
    </div>

    <button class="button is-success is-fullwidth" type="submit">Modificar</button>
</form>
