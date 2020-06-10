@extends('layouts.app')

@section('content')

<section class="section">

    
    @if($errors->any())
    <div class="container is-fluid box is-radiusless">

        <p><strong>
            Corrige estos errores para continuar
        </strong></p>

        <ul>
            @foreach($errors->all() as $errors)
            <li>{{ $errors }}</li>
            @endforeach
            <br>
        </ul>
    </div>
    @endif
    

    <div class="container">
        
        @if ($groups->count()!=0)
        <p><strong>
            Crea tu Lista
        </strong></p>

        <br>

        <button class="button is-danger modal-button" data-target="#guests" aria-haspopup="true">

            <span class="icon">
                <i class="far fa-plus-square"></i>
            </span>
            <span>Invitados</span>

        </button>

        @endif

        <div class="modal" id="guests">
            <div class="modal-background"></div>
            <div class="box modal-content">
                @include('guests.create')
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>

        <button class="button is-danger modal-button" data-target="#groups" aria-haspopup="true">

            <span class="icon">
                <i class="far fa-plus-square"></i>
            </span>
            <span>Grupos</span>

        </button>

        <div class="modal" id="groups">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">
                    @include('groups.create')
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>

        <button class="button is-danger modal-button" data-target="#menus" aria-haspopup="true">

            <span class="icon">
                <i class="far fa-plus-square"></i>
            </span>
            <span>Menu</span>

        </button>

        <div class="modal" id="menus">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="box">
                    @include('menus.create')
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>
    </div>
    
</section>

<section class="section">

    <div class="container">
    @foreach ($groups as $group)

    <table class="table is-striped is-fullwidth">

        <thead>
            <tr>
                <td class="title is-5">{{ $group->name }}</td>
                <td><strong>Asistencia</strong></td>
                <td><strong>Menu</strong></td>
                @if ($group->guests->count()==0)
                <td>@include('groups.delete')</td>
                @else
                <td>
                    <button class="button modal-button" data-target="#modal{{ $group->id }}" aria-haspopup="true">

                        <span>Modificar</span>

                    </button>

                    <div class="modal" id="modal{{ $group->id }}">
                        <div class="modal-background"></div>
                        <div class="modal-content box">
                            @include('groups.edit')
                        </div>
                        <button class="modal-close is-large" aria-label="close"></button>
                    </div>

                </td>
                @endif
            </tr>
        </thead>

        @if ($group->guests->count()==0)
        <tbody>
            <tr>
                <td>¡Sin invitados!</td>
            </tr>

        </tbody>
        @else
        <tbody>
            @foreach ($group->guests as $guest)
            <tr>
                <td><a class="has-text-black" href="{{ route('guest.edit',$guest->id) }}"><strong>{{ $guest->name }}</strong></a></td>
                <td>{{ $guest->status_name }}</td>
                @if (empty($guest->menu))
                <td>Sin asignar</td>
                @else
                <td><a class="has-text-dark" href="{{ route('menu.edit',$guest->menu->id) }}">{{ $guest->menu->name }}</a>
                </td>
                @endif
                <td>@include('guests.delete')</td>
            </tr>
            @endforeach
        </tbody>
        @endif

    </table>

    @endforeach    
    </div>
    
</section>

<div class="columns">
    <div class="column is-left"></div>
    <div class="column is-centered is-10">

        
    </div>
    <div class="column is-right"></div>
</div>

<script type="text/javascript">
    document.querySelectorAll('.modal-button').forEach(function (el) {
        el.addEventListener('click', function () {
            var target = document.querySelector(el.getAttribute('data-target'));

            target.classList.add('is-active');

            target.querySelector('.modal-close').addEventListener('click', function () {
                target.classList.remove('is-active');
            });
        });
    });

</script>

@endsection
