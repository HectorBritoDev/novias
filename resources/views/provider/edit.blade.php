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

<br>

<div class="container">

    <p class="title">Registro</p>

    <form action="{{ route('user.update',$user->id) }}" method="POST" enctype="multipart/form-data">

        <div class="card">
            <div class="card-header">
                <div class="card-header-title">
                    <p class="title is-4">Tu Empresa</p>
                </div>
            </div>
            <div class="card-content">

                @csrf
                @method('PUT')

                <div class="field is-horizontal">
                    <div class="field-body" style="max-width: 33%">
                        <div class="field">
                            <p class="control">
                                <input class="input" type="text" name="name" value="{{ $user->name }}" placeholder="Nombre de Empresa"
                                    maxlength="191" required>
                            </p>
                        </div>
                    </div>
                    <div class="field-body">
                        <div class="select">
                            <select name="provider_sector_id" id="provider_sector_id" required>
                                <option value="">Selecciona un sector</option>
                                @foreach ($sectors as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->sector_name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="data" value="1">
                        </div>
                    </div>
                </div>

                <br>

                <p>Describe tu empresa (en tercera persona)</p>

                <textarea class="textarea has-fixed-size" name="provider_description" rows="4" required>{{ $user->provider_description }}</textarea>

                <br>

                <div class="select" style="max-width: 50%">
                    <select name="municipio_id" id="municipio-searcher" required>
                        <option value="">Ubicación</option>
                        @foreach ($municipios as $municipio)
                        <option value="{{ $municipio->id_municipio }}">{{ $municipio->municipio }}, {{ $municipio->departamento->departamento }}</option>
                        @endforeach
                    </select>
                </div>

                <textarea class="textarea has-fixed-size" name="provider_adress" id="" rows="2" placeholder="Dirección"
                    maxlength="120" required>{{ $user->provider_adress }}</textarea>
            </div>
        </div>

        <br>

        <div class="card">
            <div class="card-header">
                <div class="card-header-title">
                    <p class="title is-4">Datos de Contacto</p>
                </div>
            </div>
            <div class="card-content">

                <div class="field is-horizontal">
                    <div class="field-body">
                        <input class="input" type="text" name="provider_contact_name" value="{{ $user->provider_contact_name }}"
                            maxlength="191" placeholder="Persona de Contacto *" required>
                    </div>
                    <div class="field-body">
                        <input class="input" type="email" name="provider_contact_email" value="{{ $user->provider_contact_email }}"
                            maxlength="191" placeholder="Email *" required>
                    </div>
                </div>

                <br>

                <div class="field is-horizontal">
                    <div class="field-body">
                        <input class="input" type="text" name="provider_contact_phone" value="{{ $user->provider_contact_phone }}"
                            maxlength="191" placeholder="Teléfono (Omite el primer cero)" required>
                    </div>
                    <div class="field-body">
                        <input class="input" type="text" name="provider_contact_cellphone" placeholder="Celular (Omite el primer cero)"
                            maxlength="191" value="{{ $user->provider_contact_cellphone }}">
                    </div>
                </div>

                <br>

                <div class="field is-horizontal">
                    <div class="field-body">
                        <input class="input" type="text" name="provider_contact_fax" placeholder="Fax" value="{{ $user->provider_contact_fax }}"
                            maxlength="191">
                    </div>
                    <div class="field-body">
                        <input class="input" type="text" name="provider_contact_website" placeholder="Website" value="{{ $user->provider_contact_website }}"
                            maxlength="191">
                    </div>
                </div>
            </div>
        </div>

        <br>

        <div class="card">
            <div class="card-header">
                <div class="card-header-title">
                    <p class="title is-4">Cotización y Descuento</p>
                </div>
            </div>
            <div class="card-content">

                <div class="field is-horizontal">
                    <div class="field-body">
                        <input class="input" type="text" name="provider_min_cost" placeholder="Cotización mínima" value="{{ $user->provider_min_cost }}"
                            required>
                    </div>
                    <div class="field-body">
                        <input class="input" type="number" name="provider_discount" placeholder="Descuento" value="{{ $user->provider_discount }}">
                    </div>
                </div>

            </div>
        </div>

        <br>

        <div class="buttons is-centered">
            <button class="button is-success is-fullwidth" type="submit">Guardar</button>
        </div>

        

    </form>

    <br>

</div>

@section('aditional_scripts')
<script>
    function preselect_items() {


        //Provider
        var provider_sector_id = '<?php echo $user->provider_sector_id; ?>';
        var select_provider_sector_id = document.getElementById('provider_sector_id');

        select_provider_sector_id.value = provider_sector_id;

        //Municipio
        var municipio = '<?php echo $user->municipio_id; ?>';
        var select_municipio = document.getElementById('municipio-searcher');
        select_municipio.value = municipio;
    }
    window.addEventListener('load', preselect_items);

    $(document).ready(function () {
        $('#municipio-searcher').select2();
    });

</script>
<script src="{{ asset('js/select2.full.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#municipio-searcher').select2();
    });

</script>
@endsection

@section('aditional_styles')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection
