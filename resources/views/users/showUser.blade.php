<br>
<div class="columns">
    <div class="column"></div>
    <div class="column is-centered box has-text-centered">
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Usuario: </label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        <input class="input is-static" type="email" value="{{ $user->name }}" readonly>
                    </p>
                </div>
            </div>
        </div>
        <br>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Departamento: </label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        @if ($user->departamento)
                        <input class="input is-static" type="email" value="{{ $user->departamento->departamento }}"
                            maxlength="191" readonly>
                        @else
                        Aún sin seleccionar
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <br>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Municipio: </label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        @if ($user->municipio)
                        <input class="input is-static" type="email" value="{{ $user->municipio->municipio }}" maxlength="191"
                            readonly>
                        @else
                        Aún sin seleccionar
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <br>
        @auth

        @if ($user->id==auth()->user()->id)

        <a class="button is-fullwidth is-danger" href="{{ url('user/'.$user->id.'/edit?user') }}">Editar</a>
        @endif
        @endauth
    </div>
    <div class="column"></div>
</div>
