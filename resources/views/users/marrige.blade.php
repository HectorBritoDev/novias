@extends('layouts.app')

@if (!auth()->user()->is_user)
@include('home')
@else

@section('content')

<style>
    .is-horizontal-center {
        margin-left: auto;
        margin-right: auto;
    }
</style>

<section class="section">
    <div class="container">
        <p class="title is-4">
            {{ $user->name }}
        </p>
        <br>
        @if ($user->marrige_date!=null)

        <p>
            <strong>Matrimonio:</strong>
        </p>
        <p>
            {{ $user->marrige_date }}
        </p>
        @endif
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="field">
            <p class="title is-4">Los Proveedores para mi Matrimonio</p>
        </div>
        <div class="field ">
            <a class="is-4 has-text-dark" href="{{ route('user.bySector') }}">
                <span>
                    <strong>Ver Todos</strong>
                </span>
                <span class="icon">
                    <i class="fas fa-angle-right"></i>
                </span>
            </a>
        </div>
    </div>

    <div class="container">
        <div class="columns is-multiline">

            {{-- SECTORES QUE EL USARIO TIENE LIKE --}}

            @foreach ($sectors as $sector)
            <div class="column is-one-fifth">

                <div class="card has-background-grey-lighter">
                    <div class="card-image">
                        <figure class="image is-square">
                            <img src="{{ Storage::url($sector->icon) }}" width="100px" alt="icon">
                        </figure>
                    </div>
                    <div class="card-content has-text-centered">
                        {{ $sector->sector_name }}
                        @if ($likes->where('sector_id',$sector->id)->count()==0)
                        <br>
                        @include('provider.search')
                        @else
                        <a class="has-text-dark" href="{{ route('like.show',$sector->id) }}">
                            <strong>{{ $likes->where('sector_id',$sector->id)->count() }}</strong>
                        </a>
                        @endif
                        <br><br>
                    </div>
                </div>

            </div>
            @endforeach

            {{-- SECTORES EXTRA POR SI EL USUARIO NO TIENE SUFICIENTES SECTORES CON LIKES --}}

            @if ($extra_sectors->count()>0)

            @foreach ($extra_sectors as $sector)

            <div class="column is-one-fifth">

                <div class="card has-background-grey-lighter">
                    <div class="card-image">
                        <figure class="image">
                            <img src="{{ Storage::url($sector->icon) }}" width="100px" alt="icon">
                        </figure>
                    </div>
                    <div class="card-content has-text-centered">
                        {{ $sector->sector_name }}
                        @if ($likes->where('sector_id',$sector->id)->count()==0)
                        @include('provider.search')
                        @else
                        <a class="has-text-dark" href="{{ route('like.show',$sector->id) }}">
                            <strong>
                                {{ $likes->where('sector_id',$sector->id)->count() }}
                            </strong>
                        </a>
                        <br><br>
                        @endif
                    </div>
                </div>

            </div>
            @endforeach
            @endif
        </div>
    </div>

</section>

<section class="section">
    <div class="container">
        <p class="title is-4">
            Mis Tareas
        </p>
    </div>
    <br>
    <div class="container">
        @if ($tasks_incompleted->count()==0)

        
        <a class="has-text-danger" href="{{ route('task.index') }}">
            <div class="container is-fluid ">
                <span>Sin tareas para completar</span>

                <strong>Agregar</strong>
           </div>
        </a>
        @endif

        @foreach ($tasks_incompleted as $task)

        <div class="field has-addons has-text-centered">
            <div class="control">
                @include('tasks.status')
            </div>
            <div class="control">
                <div class="input">

                    <a class="has-text-danger" href="{{ route('task.edit',$task->id) }}"><strong>{{ $task->title }}s</strong></a>
                    <p class="">, {{ $task->category->name }}</p>

                </div>
            </div>
            <div class="control">

                @include('tasks.delete')

            </div>
        </div>

        @endforeach
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-5 is-left">
                <p class="title is-5">
                    Mi Presupuesto
                </p>

                <div class="card">
                    <div class="card-body">
                        <div class="columns has-text-centered">
                            <div class="column has-text-centered is-horizontal-center">

                                <br><br><br>
                                <figure class="image is-64x64 is-horizontal-center">
                                    <img src="{{ asset('images/pago.png') }}">
                                </figure>
                                <p>Presupuesto</p>
                                <p class="has-text-success">$ {{ $global_estimated }}</p>

                            </div>
                            <div class="column has-text-centered is-horizontal-center">

                                <br><br><br>
                                <figure class="image is-64x64 is-horizontal-center">
                                    <img src="{{ asset('images/pago.png') }}">
                                </figure>
                                <p>Costo Final</p>
                                <p class="has-text-success">$ {{ $global_final }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="buttons is-centered">
                        <span class="button is-danger is-outlined">Agregar</span>
                    </div>
                    <br>
                </div>
            </div>

            <div class="column"></div>

            <div class="column is-5 is-right">
                <p class="title is-5">
                    Mis Invitados
                </p>

                @if ($guests->count()==0)
                
                <a href="{{ route('guest.index') }}">
                    <div class="card">
                        <div class="card-image">
                            <div class="container is-fluid">
                                <figure class="image is-square">
                                <img src="{{asset('images/muestras/user-plus-solid.svg')}}" width="100%">
                            </figure>  
                            </div>
                            
                        </div>
                    </div>
                </a>

                @else
                <div class="card">
                    <div class="card-body">
                        <table class="table is-fullwidth is-striped">

                            <thead>
                                <tr>
                                    <td><strong>Nombre</strong></td>
                                    <td><strong>Grupo</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guests as $guest)
                                <tr>
                                    <td>
                                        {{ $guest->name }}
                                    </td>
                                    <td>
                                        {{ $guest->group->name }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <p class="title is-5">
            Sobre mi Matrimonio
        </p>

        <form action="{{ route('user.update',$user->id .'?marrige') }}" method="POST">

            @csrf
            @method('PUT')

            <input type="hidden" name="marrige" value="1">

            <div class="columns box">

                <div class="column is-one-third">
                    <div class="select">
                        <select name="wedding_color_id" id="select-color">
                            <option value="">Color</option>
                            @foreach ($colors as $color)
                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="column is-one-third">
                    <div class="select">
                        <select name="wedding_style_id" id="select-style">
                            <option value="">Estilo</option>
                            @foreach ($styles as $style)
                            <option value="{{ $style->id }}">{{ $style->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="column is-one-third">
                    <div class="select">
                        <select name="wedding_weather_id" id="select-weather">
                            <option value="">Clima</option>
                            @foreach ($weathers as $weather)
                            <option value="{{ $weather->id }}">{{ $weather->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <br>

            <a class="buttons is-centered" type="submit">
                <span class="button is-danger is-outlined">Guardar</span>
            </a>

        </form>

    </div>
</section>

@endsection


@section('aditional_scripts')
<script>
    function preselect_items() {
        //Color de boda
        var color = '<?php echo $user->wedding_color_id; ?>';
        var select_wedding_color = document.getElementById('select-color');
        //Estilo de boda
        var style = '<?php echo $user->wedding_style_id; ?>';
        var select_wedding_style = document.getElementById('select-style');
        //Clima de boda
        var weather = '<?php echo $user->wedding_weather_id; ?>';
        var select_wedding_weather = document.getElementById('select-weather');

        select_wedding_color.value = color;
        select_wedding_style.value = style;
        select_wedding_weather.value = weather;
    }
    window.addEventListener('load', preselect_items);

</script>
@endsection

@endif
