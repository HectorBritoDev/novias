<section class="section">

    @if($errors->any())

    <div class="container is-fluid box is-radiusless">

        <p><strong>
                Corrige estos errores para continuar
            </strong></p>

        <ul>
            @foreach($errors->all() as $errors)
            <li class="">{{ $errors }}</li>
            @endforeach
        </ul>

    </div>

    @endif

    <div class="container">

        <p class="title">Datos Personales</p>

        <br>

        <form action="{{ route('user.update',$user->id) }}" method="POST">
            {{ method_field('PUT') }}
            @csrf
            <input type="hidden" name="user" value="1" required>

            <div class="columns">
                <div class="column">
                    <label class="label">Nombre y Apellido: </label>

                    <input class="input" type="text" value="{{ old('name',$user->name) }}" name="name" maxlength="191"
                        style="max-width: 60%">

                    <br><br>

                    <label class="label">Email: </label>
                    <input class="input" type="text" value="{{ $user->email }}" name="email" readonly maxlength="191"
                        style="max-width: 60%">

                    <br><br>

                    <label class="label">Telefono: </label>
                    <input class="input" type="text" value="{{  $user->phone }}" name="phone" placeholder="Omite el primer cero"
                        maxlength="10" style="max-width: 60%">

                    <br><br>

                    <div class="field is-horizontal">
                        <div class="field-label is-primary">
                            <label class="label" for="gender">Yo Soy: </label>
                        </div>
                        <div class="field-body">
                            <label class="radio">
                                <input type="radio" id="male" value="male" name="gender">
                                Novio
                            </label>
                            <label class="radio">
                                <input type="radio" id="female" value="female" name="gender">
                                Novia
                            </label>
                            <label class="radio">
                                <input type="radio" id="other" value="other" name="gender">
                                Otro
                            </label>
                        </div>
                    </div>
                    <label class="label" for="father_name">
                        Padre:
                    </label>
                    <input class="input" type="text" name="father_name" value="{{ old('father_name',$user->father_name) }}"
                        style="max-width: 35%">

                    <label class="label" for="father_birthday">Cumpleaños: </label>

                    <input class="input" type="date" value="{{ old('father_birthday',$user->father_birthday) }}" name="father_birthday"
                        style="max-width: 35%">

                    <label class="label" for="mother_name">
                        Madre:
                    </label>
                    <input class="input" type="text" name="mother_name" value="{{ old('mother_name',$user->mother_name) }}"
                        style="max-width: 35%">

                    <label class="label" for="mother_birthday">Cumpleaños: </label>

                    <input class="input" type="date" value="{{ old('mother_birthday',$user->mother_birthday) }}" name="mother_birthday"
                        style="max-width: 35%">

                </div>
                <div class="column">
                    <label class="label" for="about_me">Sobre Mi: </label>
                    <textarea class="textarea has-fixed-size" placeholder=" Breve descripción sobre ti." value="" name="about_me"
                        maxlength="190" rows="8">{{ old('about_me',$user->about_me) }}</textarea>


                </div>

            </div>

            <br>

            <div style="max-width: 100%; background-color: #DCDCDC; height: 2px"></div>

            <br><br>

            <h2 class="title is-4">Mi Matrimonio: </h2>

            <label class="label" for="wedding_municipio_id">Localidad: </label>
            <select name="wedding_municipio_id" id="municipio-searcher">
                <option value="">Seleccione uno</option>

                @foreach ($municipios as $municipio)

                <option value="{{ $municipio->id_municipio }}" @if ($municipio->id_municipio ==
                    $user->wedding_municipio_id)
                    selected
                    @endif>{{ $municipio->municipio }}, {{ $municipio->departamento->departamento }}</option>
                @endforeach
            </select>

            <br><br>

            <label class="label" for="partner_name">Mi Pareja: </label>

            <input class="input" type="text" value="{{ old('partner_name',$user->partner_name) }}" name="partner_name"
                maxlength="191" style="max-width: 35%">

            <label class="label" for="partner_birthday">Cumpleaños: </label>

            <input class="input" type="date" value="{{ old('partner_birthday',$user->partner_birthday) }}" name="partner_birthday"
                style="max-width: 35%">

            <br><br>

            <div class="field is-horizontal">
                <div class="field-label is-primary">
                    <label class="label" for="partner_gender">Mi Pareja es: </label>
                </div>

                <div class="field-body">
                    <label class="radio">
                        <input type="radio" id="partner_male" value="male" name="partner_gender">Novio
                    </label>
                    <label class="radio">
                        <input type="radio" id="partner_female" value="female" name="partner_gender">Novia
                    </label>
                    <label class="radio">
                        <input type="radio" id="partner_other" value="other" name="partner_gender">Otro
                    </label>
                </div>
            </div>

            <br>

            <div class="columns">
                <div class="column">
                    <label class="label" for="marrige_date">
                        Día de mi boda:
                    </label>
                    <input class="input" type="date" name="marrige_date" value="{{ old('marrige_date',$user->marrige_date) }}"
                        style="max-width: 35%">

                    <br><br>

                    <div class="columns">
                        <div class="column">
                            <label class="label" for="wedding_start">
                                Hora de inicio:
                            </label>
                            <div class="select">
                                <select name="wedding_hour_start" id="wedding-hour-start">
                                    <option value="">Hora</option>
                                    @for ($i = 0; $i < 24; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                            </div>
                            <div class="select">
                                <select name="wedding_minute_start" class="" id="wedding-min-start">
                                    <option value="">Min</option>
                                    @for ($i = 0; $i < 60; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>

                        <div class="column">
                            <label class="label" for="wedding_finish">Hora de Finalización: </label>
                            <div class="select">
                                <select name="wedding_hour_finish" id="wedding-hour-finish">
                                    <option value="">Hora</option>
                                    @for ($i = 0; $i < 24; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                            </div>
                            <div class="select">
                                <select name="wedding_minute_finish" id="wedding-min-finish">
                                    <option value="">Min</option>
                                    @for ($i = 0; $i < 60; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="column">
                    <label class="label" for="expected_guests">Numero de Invitados: </label>
                    <input class="input" type="number" name="expected_guests" value="{{ old('expected_guests',$user->expected_guests) }}"
                        style="max-width: 50%">
                </div>
            </div>

            <br><br>

            <div class="columns has-text-centered">
                <div class="column">
                    <label class="label" for="wedding_color">Color: </label>
                    <div class="select">
                        <select name="wedding_color_id" id="select-wedding-color">
                            @foreach ($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="column">
                    <label class="label" for="wedding_style_id">Estilo: </label>
                    <div class="select">
                        <select name="wedding_style_id" id="select-wedding-style">
                            @foreach ($styles as $style)
                            <option value="{{ $style->id }}">{{ $style->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="column">
                    <label class="label" for="wedding_weather_id">Clima: </label>
                    <div class="select">
                        <select name="wedding_weather_id" id="select-wedding-weather">
                            @foreach ($weathers as $style)
                            <option value="{{ $style->id }}">{{ $style->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <br>

            <label class="label" for="about_my_marrige">Sobre mi Matrimonio: </label>

            <textarea class="textarea has-fixed-size" placeholder="Hablanos sobre tu matrimonio" name="about_my_marrige"
                rows="6">{{ old('about_my_marrige',$user->about_my_marrige) }}</textarea>

            <br>

            <div class="buttons is-centered">
                <button class="button is-danger is-outlined" type="submit">
                    Guardar Cambios
                </button>
            </div>


        </form>

    </div>

</section>



@section('aditional_scripts')
@if (auth()->user()->is_user)

{{-- LOS SCRIPTS SOLO SE CARGARAN SI EL USUARIO ES UN CLIENTE --}}

<script>
    function preselect_items() {


        // genero usuario
        var gender = '<?php echo $user->gender; ?>';
        var radio_gender = document.getElementsByName('gender');
        //genero pareja
        var partner_gender = '<?php echo $user->partner_gender; ?>';
        var radio_partner = document.getElementsByName('partner_gender');
        //Color de boda
        var color = '<?php echo $user->wedding_color_id; ?>';
        var select_wedding_color = document.getElementById('select-wedding-color');
        //Estilo de boda
        var style = '<?php echo $user->wedding_style_id; ?>';
        var select_wedding_style = document.getElementById('select-wedding-style');
        //Clima de boda
        var weather = '<?php echo $user->wedding_weather_id; ?>';
        var select_wedding_weather = document.getElementById('select-wedding-weather');
        //Municipio de boda
        var municipio = '<?php echo $user->wedding_municipio_id; ?>';
        var select_wedding_municipio = document.getElementById('municipio-searcher');
        //Hora de inicio
        var hour_start = '<?php echo $user->wedding_hour_start; ?>';
        var select_wedding_hour_start = document.getElementById('wedding-hour-start');
        //Minuto de inciio
        var min_start = '<?php echo $user->wedding_minute_start; ?>';
        var select_wedding_min_start = document.getElementById('wedding-min-start');
        //Hora de finalizacion
        var hour_finish = '<?php echo $user->wedding_hour_finish; ?>';
        var select_wedding_hour_finish = document.getElementById('wedding-hour-finish');
        //Minuto de finalizacion
        var min_finish = '<?php echo $user->wedding_minute_finish; ?>';
        var select_wedding_min_finish = document.getElementById('wedding-min-finish');

        for (i = 0; i < radio_gender.length; i++) {

            if (radio_gender[i].value == gender) {
                radio_gender[i].checked = true;
            }
        }

        for (i = 0; i < radio_partner.length; i++) {

            if (radio_partner[i].value == partner_gender) {
                radio_partner[i].checked = true;
            }
        }

        select_wedding_color.value = color;
        select_wedding_style.value = style;
        select_wedding_weather.value = weather;
        select_wedding_municipio.value = municipio;
        select_wedding_hour_start.value = hour_start;
        select_wedding_min_start.value = min_start;
        select_wedding_hour_finish.value = hour_finish;
        select_wedding_min_finish.value = min_finish;
    }
    window.addEventListener('load', preselect_items);

</script>

@endif
<script type='text/javascript' src='{{ asset('js/froala_editor.min.js') }}'></script>
<script src="{{ asset('js/select2.full.min.js') }}"></script>


<script>
    $(document).ready(function () {
        $('#municipio-searcher').select2();
    });

</script>
@endsection

@section('aditional_styles')
<link href='{{ asset('css/froala_editor.min.css') }}' rel='stylesheet' type='text/css' />
<link href='{{ asset('css/froala_style.min.css') }}' rel='stylesheet' type='text/css' />
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection
