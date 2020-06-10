@extends('layouts.app')

@section('content')

<br>

<div class="container">
    <section class="section">
        <p><strong>Mis Proveedores favoritos</strong></p>

        <p>Aca se muestran los proveedores que te gustan, si te gustan, contactalos.</p>
    </section>
    <div class="container is-fluid">

        <table class="table is-narrow is-striped">
            <tbody>
                <tr>
                    <td>
                        @if ($likes->count()==0)
                        No tienes proveedores agregados
                        @else
                        @foreach ($likes as $like)
                        <article class="media">
                            <figure class="media-left">
                                <p class="image is-64x64">
                                    <img src="{{ Storage::url($like->provider_logo) }}" alt="logo">
                                </p>
                            </figure>
                            <div class="media-content">
                                <div class="content">
                                    <p>
                                        <a class="has-text-dark" href="{{ route('user.show',$like->id . '?provider') }}"><strong>{{ $like->provider->name }}</strong></a>
                                    </p>
                                </div>
                            </div>
                        </article>
                        <br>
                        @endforeach
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>

@endsection
