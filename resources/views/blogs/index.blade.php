@extends('layouts.app')

@section('content')

@auth

@if (auth()->user()->is_admin)

<br><br>

<div class="buttons is-centered">
    <a class="button is-danger is-outlined" href="{{ route('blog.create') }}">
        ¡Crear un nuevo artículo!
    </a>
</div>

@endif

@endauth

<br>

<div class="container">
    <div class="field is-horizontal">
        <div class="fiel-label is-primary">
            <label for="" class="label">Categorias:</label>
        </div>

        <div class="fiel-body">

            <div class="tags">
                @foreach ($tags as $tag)

                <a class="tag is-danger" href="{{ route('blog.index','tag='.$tag->id) }}">{{ $tag->name }}</a>

                @endforeach

                <a class="tag" href="{{ route('blog.index') }}">Todas</a>
            </div>

        </div>
    </div>
</div>

@if ($articles->count() ==0)

<br><br>

<div class="container has-text-centered">
    <p><strong>
            ¡No hay articulos creados!
        </strong></p>
</div>

@else

<section class="section">
    <div class="container">
        <div class="columns is-multiline">
            @if ($articles->count() ==0)

            <div class="column has-text-centered">
                <p><strong>¡No hay articulos creados!</strong></p>
            </div>

            @else

            @foreach ($articles as $article)

            <div class="column is-4">
                <div class="card">
                    <a class="has-text-dark" href="{{ route('blog.show',$article->id) }}">
                        <div class="card-image">
                            <figure class="image">
                                <img src="{{ Storage::url($article->main_photo) }}" alt="main-photo" width="100">
                            </figure>
                        </div>
                        <div class="card-title has-text-centered">
                            <p class="title is-5">
                                {{ $article->name }}
                            </p>
                            <p class="tag">
                                {{ $article->tag->name }}
                            </p>
                        </div>
                        <div class="card-content">
                            <p>
                                {!! str_limit($article->description,50) !!}
                            </p>
                        </div>
                    </a>
                    <div class="card-footer">
                        <div class="card-footer-item">
                            @auth

                            @if (auth()->user()->is_admin)
                            @include('blogs.delete')
                            @endif

                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

            @endif
        </div>
    </div>
</section>



@endif
@endsection
