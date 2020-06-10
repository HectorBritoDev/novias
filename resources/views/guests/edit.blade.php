@extends('layouts.app')

@section('content')

@if($errors->any())

<br>

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

<br>

<div class="columns">
    <div class="column is-left"></div>
    <div class="column is-1 is-centered">
        <a class="button" href="{{ route('guest.index') }}">Volver</a>
    </div>
    <div class="column is-right"></div>
</div>

<div class="container has-text-centered box">

    <div class="field is-horizontal">
        <p class="field-label">
            <h1 class="title is-3">{{ $guest->name }}</h1>
        </p>
        <p class="field-body">
            @include('guests.delete')
        </p>
    </div>

    <form action="{{ route('guest.update',$guest->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="columns">
            <div class="column">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="name">Nombre</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input class="input" type="text" name="name" value="{{ old('name',$guest->name) }}"
                                    maxlength="191" required>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="surname">Apellido</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input class="input" type="text" name="surname" value="{{ old('surname',$guest->surname) }}"
                                    maxlength="191">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="columns">
            <div class="column">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="status">Asistencia</label>
                    </div>
                    <div class="field-body">
                        <div class="select">
                            <select name="status" id="select-status">
                                <option value="0">Pendiente</option>
                                <option value="1">Confirmado</option>
                                <option value="2">Cancelado</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="group">Grupo</label>
                    </div>
                    <div class="field-body">
                        <div class="select">
                            <select class="select" name="group_id" id="select-group">
                                @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="menu">Menu</label>
                    </div>
                    <div class="field-body">
                        <div class="select">
                            <select class="select" name="menu_id" id="select-menu">
                                <option value="">Seleccionar</option>
                                @foreach ($menus as $menu)
                                <option class="has-text-black" value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <br>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label" for="gender">Género</label>
            </div>
            <div class="field-body">
                <label class="radio">
                    <input type="radio" id="male" value="0" name="gender">Hombre
                </label>
                <label class="radio">
                    <input type="radio" id="female" value="1" name="gender">Mujer
                </label>
            </div>
            <div class="field-label is-normal">
                <label class="label" for="age">Edad: </label>
            </div>
            <div class="field-body">
                <input type="radio" name="age" id="adult" value="0">Adulto
                <input type="radio" name="age" id="kid" value="1">Niño
            </div>

        </div>

        <br>

        <p class="title is-4">Datos de Contacto</p>

        <div class="columns">
            <div class="column">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="phone">Telefono</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input class="input" type="text" placeholder="Excluye el primer cero" name="phone"
                                    value="{{ old('phone',$guest->phone) }}" maxlength="191">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="cellphone">Celular</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input class="input" type="text" placeholder="Excluye el primer cero" name="cellphone"
                                    value="{{ old('cellphone',$guest->cellphone) }}" maxlength="191">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label" for="adress">Direccion</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        <input class="input" type="text" name="adress" value="{{ old('adress',$guest->adress) }}"
                            maxlength="191">
                    </p>
                </div>
            </div>
        </div>

        <br>

        <div class="columns">
            <div class="column">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="id_municipio">Municipio</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <select class="select" name="municipio_id" id="searcher-municipio" style="max-width: 40%">
                                    <option></option>
                                    @foreach ($municipios as $municipio)
                                    <option value="{{ $municipio->id_municipio }}">{{ $municipio->municipio }},{{ $municipio->departamento->departamento }}</option>
                                    @endforeach
                                </select>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label" for="postal_code">Codigo Postal</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input class="input" type="text" name="postal_code" value="{{ old('postal_code',$guest->postal_code) }}"
                                    maxlength="191">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="column is-fullwidth">
            <button class="button is-danger is-outlined is-fullwidth" type="submit">Guardar</button>
        </div>

    </form>

</div>

<br>

@endsection

@section('aditional_scripts')

<script src="{{ asset('js/select2.full.min.js') }}"></script>

<script>
    function preselected_items() {
        var status = '<?php echo $guest->status; ?>';
        var select_status = document.getElementById('select-status');
        select_status.value = status;

        var group_id = '<?php echo $guest->group_id; ?>';
        var select_group = document.getElementById('select-group');
        select_group.value = group_id;

        var menu_id = '<?php echo $guest->menu_id; ?>';
        var select_menu = document.getElementById('select-menu');
        select_menu.value = menu_id;


        var municipio_id = '<?php echo $guest->municipio_id; ?>';
        var select_municipio = document.getElementById('searcher-municipio');
        select_municipio.value = municipio_id;

        var gender = '<?php echo $guest->gender; ?>';
        var radio_gender = document.getElementsByName('gender');
        for (i = 0; i < radio_gender.length; i++) {

            if (radio_gender[i].value == gender) {
                radio_gender[i].checked = true;
            }
        }

        var radio_age = document.getElementsByName('age');
        var age = '<?php echo $guest->age; ?>';
        for (i = 0; i < radio_age.length; i++) {

            if (radio_age[i].value == age) {
                radio_age[i].checked = true;
            }
        }
    }
    window.addEventListener('load', preselected_items)

</script>

<script>
    $(document).ready(function () {
        $('#searcher-municipio').select2();
    });

</script>
@endsection


@section('aditional_styles')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection
