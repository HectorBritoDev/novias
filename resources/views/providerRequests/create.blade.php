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
            <input class="input" type="text" name="applicant_name" maxlength="191" @if (auth()->check())
            value="{{ auth()->user()->name }}"
            @endif placeholder="Nombre y Apellido"
            required>
            <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
            </span>
        </p>
    </div>
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input class="input" type="text" name="applicant_email" maxlength="191" @if (auth()->check()) value="{{ auth()->user()->email }}"
            @endif placeholder="Email"
            required>
            <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
            </span>
        </p>
    </div>
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input class="input" type="text" name="applicant_phone" maxlength="191" @if (auth()->check()) value="{{ auth()->user()->phone }}"
            @endif placeholder="Telefono (Omite el primer cero)"
            required>
            <span class="icon is-small is-left">
                <i class="fas fa-phone"></i>
            </span>
        </p>
    </div>
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input class="input" type="date" value="{{ $today }}" name="applicant_date" maxlength="191" required>
            <span class="icon is-small is-left">
                <i class="fas fa-calendar-alt"></i>
            </span>
        </p>
    </div>
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <input class="input" type="text" name="applicant_guests_number" placeholder="Invitados" maxlength="191"
                required>
            <span class="icon is-small is-left">
                <i class="fas fa-users"></i>
            </span>
        </p>
    </div>
    <div class="field">
        <p class="control has-icons-left has-icons-right">
            <textarea name="applicant_comment" minlength="5" rows="4" class="textarea has-fixed-size" placeholder="Mensaje"
                required></textarea>
        </p>
    </div>
    @auth
    @if (auth()->user()->is_user)
    <button class="button is-danger is-fullwidth" type="submit">Enviar Solicitud</button>
    @endif
    @endauth
</form>
