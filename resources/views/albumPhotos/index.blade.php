@extends('layouts.app')

@section('content')

<style type="text/css">
    .is-horizontal-center {
        justify-content: center;
    }

</style>
<section class="section">

    <div class="container">
        @auth

        @if ($album->user_id == auth()->user()->id)
        <div class="buttons is-right">
            <a class="button" href="{{ route('album.index') }}">Volver</a>
        </div>
        @endif
        @endauth

        <p class="title is-4">
            {{ $album->name }}
        </p>

        @auth
        @if ($album->user_id == auth()->user()->id)
        @include('albumPhotos.create')
        @endif
        @endauth
    </div>

    <div class="container">
        <div class="columns is-multiline">

            @if ($photos->count()==0)

            <div class="column has-text-centered">
                ¡No hay fotos en este album!
            </div>

            @else

            @foreach ($photos as $photo)
            <div class="column is-2">

                <div class="card">

                    <div class="card-image">
                        <a class="modal-button" data-target="#modal{{ $photo->id }}" aria-haspopup="true">

                            <figure class="image is-3by4">

                                <img src="{{ Storage::url($photo->photo) }}" alt="photo">

                            </figure>

                        </a>
                    </div>

                    <div class="card-footter">
                        @auth

                        @if ($album->user_id == auth()->user()->id)

                        <div class="card-footer-item">
                            @include('albumPhotos.delete')
                        </div>
                        @endif
                        @endauth
                    </div>
                </div>

            </div>

            @endforeach

            @endif
        </div>
    </div>
</section>

@foreach ($photos as $photo)
<div class="modal" id="modal{{ $photo->id }}">
    <div class="modal-background"></div>
    <div class="modal-content has-text-centered">
        <a href="{{ route('albumPhoto.show',$photo->id) }}">
            <img class="is-horizontal-center" src="{{ Storage::url($photo->photo) }}" style="max-width: 65%">
        </a>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
</div>
@endforeach

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
