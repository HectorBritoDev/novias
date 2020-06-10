@extends('layouts.app')

@section('content')



<section class="section">
    <div class="container">
        @auth
        @if (auth()->user()->is_admin)

        <div class="buttons is-centered">
            <a class="button" href="{{ route('blog.edit',$article->id) }}">Editar</a>
        </div>

        @endif
        @endauth

        <div class="container box is-radiusless">
            <p class="title is-3">
                {{ $article->name }}
            </p>
            <div class="tags">
                <span class="tag is-medium">
                    {{ $article->tag->name }}
                </span>
            </div>

            <figure class="image is-16by9">
                <img src="{{ Storage::url($article->main_photo) }}" alt="main-photo">
            </figure>

            <div class="fr-view">
                <p>{!! $article->description !!}</p>
            </div>


        </div>
    </div>
</section>


@endsection

@section('aditional_scripts')
<!-- Include JS file. -->
<script type='text/javascript' src='{{ asset('js/froala_editor.min.js') }}'></script>
@endsection

@section('aditional_styles')
<!-- Include Editor style. -->
<link href='{{ asset('css/froala_editor.min.css') }}' rel='stylesheet' type='text/css' />
<link href='{{ asset('css/froala_style.min.css') }}' rel='stylesheet' type='text/css' />

@endsection
