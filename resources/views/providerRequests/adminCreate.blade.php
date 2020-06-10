@if($errors->any())
<br>

<div class="container is-fluid box is-radiusless">
    <p><strong>
            Corrige estos errores para continuar:
        </strong></p>
    <ul>
        @foreach($errors->all() as $errors)
        <li class="">{{ $errors }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('request.store') }}" method="POST">
    @csrf

    <input type="hidden" name="for" value="{{ $user->id }}">
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input class="input" type="text" name="applicant_name" value="{{ auth()->user()->name }}" placeholder="Nombre y Apellido"
                maxlength="120" required>
            <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
            </span>
        </p>
    </div>
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <textarea name="applicant_comment" minlength="5" rows="4" class="textarea has-fixed-size" placeholder="Mensaje"
                required></textarea>
        </p>
    </div>


    <button class="button is-danger is-fullwidth" type="submit">Enviar Revisión</button>


</form>
