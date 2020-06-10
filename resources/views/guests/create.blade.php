<br>



<div class="card">
    <div class="card-header">
        <div class="card-header-title has-text-centered">
            <p class="title">Invitado</p>
        </div>
    </div>
    <div class="card-content">
        <form class="has-text-centered" action="{{ route('guest.store') }}" method="POST">

            @csrf

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Nombre:</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input" type="text" name="name" value="{{ old('name') }}" placeholder="Ejemplo: Manuel, Hector, Simón..."
                                maxlength="191" minlength="2" required>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label" style="max-width: 25%">
                    <label class="label" for="group">Grupo:</label>
                </div>
                <div class="field-body" style="max-width: 25%">
                    <div class="select">
                        @if ($guest_groups->count()>1)
                        <select class="select" name="group" required>
                            <option value="">Elige uno</option>
                            @foreach ($guest_groups as $guest_group)
                            <option value="{{ $guest_group->id }}"> {{ $guest_group->name }}</option>
                            @endforeach
                        </select>
                        @else
                        <select class="select" name="group" required>
                            @foreach ($guest_groups as $guest_group)
                            <option value="{{ $guest_group->id }}"> {{ $guest_group->name }}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                </div>
                <div class="field-label" style="max-width: 25%">
                    <label for="menu" class="label">Menu</label>
                </div>
                <div class="field-body" style="max-width: 25%">
                    @if ($menus->count()>0)
                    <div class="select">

                        <select class="select" name="menu">

                            <option value="">Elige uno</option>
                            @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}"> {{ $menu->name }}</option>
                            @endforeach

                        </select>

                    </div>
                    @endif
                </div>
            </div>

            <br>

            <button class="button is-success is-outlined is-fullwidth" type="submit">Crear</button>
        </form>
    </div>
</div>
