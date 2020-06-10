@extends('layouts.app')

@section('content')

<br>

<div class="container">
    <p class="title">Sectores</p>

    <div class="content">
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
        <button class="button modal-button is-large" data-target="#modalCreate" aria-haspopup="true">

            <span class="icon">
                <i class="far fa-plus-square"></i>
            </span>
            <span><strong>Crear Sector</strong></span>

        </button>

        <div class="modal" id="modalCreate">
            <div class="modal-background"></div>
            <div class="modal-content">
                <div class="content box is-radiusless">
                    @include('sectors.create')
                </div>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-header-title">
                <p><strong>Listado:</strong></p>
            </div>
        </div>
        <br>
        <div class="card-body">
            <div class="columns  is-multiline">
                @foreach ($sectors as $sector)

                <div class="column is-one-quarter">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-square">
                                <img src="{{ Storage::url($sector->icon) }}" alt="icon">
                            </figure>
                        </div>
                        <div class="card-content has-text-centered">
                            <a class="modal-button has-text-dark" data-target="#modal{{ $sector->id }}" aria-haspopup="true">
                                <strong>{{ $sector->sector_name }}</strong>
                            </a>

                            <div class="modal" id="modal{{ $sector->id }}">
                                <div class="modal-background"></div>
                                <div class="modal-content">
                                    @include('sectors.edit')
                                </div>
                                <button class="modal-close is-large" aria-label="close"></button>
                            </div>

                            <p>{{ $sector->category->category_name }}</p>

                            <br>

                            <div class="buttons is-centered">
                                @include('sectors.delete')
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
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
