@extends('layouts.app')

@section('content')

<section class="section">
    <div class="container">

        <p class="title">
            Álbumes
        </p>

        @include('albums.create')

        <br>

        <div class="container">
            <div class="columns is-multiline">
                @if ($albums->count()==0)

                <div class="column has-text-centered">
                    <p>
                        ¡No tienes ningun album aún!
                    </p>
                </div>

                @else

                @foreach ($albums as $album)

                <div class="column is-3 is-narrow">
                    <div class="card">
                        <a class="title is-5 has-text-dark" href="{{ route('albumPhoto.index','album='.$album->id) }}">
                            <div class="card-image">
                                <figure class="image is-square">
                                    <img src="{{ Storage::url($album->main_photo) }}" alt="album">
                                </figure>
                            </div>
                            <div class="card-title has-text-centered">

                                {{ $album->name }}

                            </div>
                        </a>
                        <br>
                        <div class="card-footer">

                            <div class="card-footer-item">
                                <a class="button modal-button" data-target="#modal{{ $album->id }}" aria-haspopup="true">
                                    Editar
                                </a>

                                <div class="modal" id="modal{{ $album->id }}">
                                    <div class="modal-background"></div>
                                    <div class="modal-content">
                                        @include('albums.edit')
                                    </div>
                                    <button class="modal-close is-large" aria-label="close"></button>
                                </div>

                            </div>
                            <div class="card-footer-item">
                                @include('albums.delete')
                            </div>

                        </div>
                    </div>
                </div>

                @endforeach
                @endif
            </div>
        </div>

    </div>
</section>

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
