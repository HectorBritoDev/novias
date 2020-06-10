@extends('layouts.app')

@section('content')

<br>

<div class="container box is-radiusless">

    <p class="title">Preguntas Frecuentes</p>

    <br>

    @if ($faqs->count()<10) @include('faqs.create') @endif <br>


        @foreach ($faqs as $faq)

        <div class="field is-horizontal">
            <div class="field">
                <p class="has-text-danger">+</p>
            </div>
            <div class="field">
                <a class="modal-button has-text-dark" data-target="#modal{{ $faq->id }}" aria-haspopup="true"><strong>{{ $faq->question }}</strong></a>

                <div class="modal" id="modal{{ $faq->id }}">
                    <div class="modal-background"></div>
                    <div class="modal-content box is-radiusless">
                        @include('faqs.edit')
                    </div>
                    <button class="modal-close is-large" aria-label="close"></button>
                </div>
            </div>
            <div class="field">
                <p>-</p>
            </div>
            <div class="field">
                <p>{{ $faq->answer }}</p>
            </div>
            <div class="field">
                @include('faqs.delete')
            </div>
        </div>

        @endforeach

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
