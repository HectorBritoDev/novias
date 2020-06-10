@extends('layouts.app')

@section('content')

<section class="hero is-fullheight">

    <div class="hero-body" style="background-image: url({{ asset('images/novias-banner.jpg')}})">
        <div class="container has-text-centered">

            <div class="container has-text-centered">
                <form action="{{ route('user.search') }}" method="GET">

                    <div class="field has-addons">
                        <input class="input is-medium" type="text" name="sector" placeholder="¿Qué Buscas?" id="searcher-sector"
                            maxlength="191">
                        <button class="button green_web is-medium century" type="submit">Buscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="hero-foot has-background-white">
        <nav class="tabs is-boxed is-fullwidth">
            <div class="container">
                <ul>
                    <li>
                        <a class="button caviar" href="{{ route('user.providers') }}">
                            Encuentra a tus Proveedores
                        </a>
                    </li>
                    <li>
                        <a class="button caviar" href="{{ route('guest.index') }}">
                            Organiza tus lista de invitados
                        </a>
                    </li>
                    <li>
                        <a class="button caviar" href="{{ route('task.index') }}">
                            Agenda de Tareas
                        </a>
                    </li>
                    <li>
                        <a class="button  caviar organiza" href="{{ route('marrige.index') }}">
                            ¿Organiza tu Matrimonio Ahora!
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>

<section class="has-background-white-ter">

    <br>
    <br>

    <div class="columns">
        <div class="column is-left"></div>
        <div class="column is-10 is-centered">

            <div class="columns">
                @foreach ($albums as $album)

                <div class="column is-3">
                    <div class="card">
                        <a href="{{ route('albumPhoto.index','album='.$album->id) }}">
                            <div class="card-image">
                                <figure class="image is-square">
                                    <img src="{{ Storage::url($album->main_photo) }}" alt="album">
                                </figure>
                            </div>
                        </a>
                        <div class="card-content has-text-centered">
                            <div>
                                <a href="{{ route('user.show',$album->user_id) }}">
                                    <strong class="has-text-dark">{{ $album->user->name }}</strong>
                                </a>

                            </div>
                            <div>

                                {{ $album->user->municipio->full_municipio }}
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

        </div>
        <div class="column is-right"></div>
    </div>
    <div class="has-text-centered">
        <button class="button green_web century">Ver Más</button>
    </div>
    <br>
</section>

<br>

<section class="has-background-grey has-text-centered">

    <br>

    <a class="title has-text-white caviar" href="">Proveedores Destacados</a>

    <br>
    <br>

    <div class="columns">
        <div class="column is-left"></div>
        <div class="column is-10 is is-centered">

            <div class="columns">
                @foreach ($providers as $provider)
                <div class="column is-3">
                    <div class="card">
                        <div class="card-image">
                            <a href="{{ route('user.show',$provider->id.'?provider') }}">
                                <figure class="image">
                                    <img src="{{ Storage::url($provider->provider_logo) }}" alt="logo">
                                </figure>
                            </a>
                        </div>
                        <div class="card-content">
                            <p><strong>{{ $provider->name }}</strong></p>
                            <p>{{ $provider->municipio->full_municipio }}</p>
                        </div>
                        <div class="card-footer has-text-centered">
                            <div class="card-footer-item">
                                <p>Precio desde:</p>
                                <p>${{ $provider->provider_min_cost }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        <div class="column is-right"></div>
    </div>
    <br>
</section>

<section class="has-background-white">

    <br>
    <br>
    <br>
    <br>

    <div class="columns has-addons has-text-centered">
        <div class="column is-one-quarter"></div>
        <div class="column is-one-quarter">
            <br><br><br><br>
            <a class="title is-5 has-text-black caviar" href=""><strong>Crea la Web de tu Matrimonio</strong></a>
        </div>
        <div class="column is-one-quarter">
            <img src="{{asset('images/phone.png')}}">
        </div>
        <div class="column is-one-quarter"></div>
    </div>
</section>

<section class="columns has-background-white">

    <div class="column is-left"></div>
    <div class="column is-10 is-centered has-text-centered">

        <br>
        <br>
        <br>

        <div class="columns">
            <div class="column is-left"></div>
            <div class="column is-6 is-centered">

                <p class="title is-3 caviar"><strong>Catalogo de Moda Nupcial</strong></p>
                <p class="title is-5 caviar">Descubre las últimas tendencias de los mejores diseñadores en vestidos de novias,
                    trajes de novio, complementos y más.</p>

            </div>
            <div class="column is-right"></div>
        </div>

        <br>
        <br>
        <br>

        <div class="columns">

            <style type="text/css">
                #dress {

                    width: 50%;
                    height: auto;

                }

            </style>

            <div class="column">
                <figure><img src="{{asset('images/ProduCate.png')}}" href="#" id="dress"></figure>
            </div>
            <div class="column">
                <figure><img src="{{asset('images/ProduCate.png')}}" href="#" id="dress"></figure>
            </div>
            <div class="column">
                <figure><img src="{{asset('images/ProduCate.png')}}" href="#" id="dress"></figure>
            </div>
            <div class="column">
                <figure><img src="{{asset('images/ProduCate.png')}}" href="#" id="dress"></figure>
            </div>
            <div class="column">
                <figure><img src="{{asset('images/ProduCate.png')}}" href="#" id="dress"></figure>
            </div>
            <div class="column">
                <figure><img src="{{asset('images/ProduCate.png')}}" href="#" id="dress"></figure>
            </div>
            <div class="column">
                <figure><img src="{{asset('images/ProduCate.png')}}" href="#" id="dress"></figure>
            </div>

        </div>

        <button class="button green_web is-outlined century">Ver Catalogo</button>

    </div>
    <div class="column is-right"></div>

</section>

<section class="has-background-white">

    <br>
    <br>
    <br>

    <style type="text/css">
        #prov_mues {
            width: 100%;
            height: auto;
        }

    </style>

    <div class="columns">

        <div class="column is-left"></div>
        <div class="column is-10 is-centered has-text-centered">

            <p class="title caviar">Empresas especializadas en matrimonios por categoría</p>

            <div class="columns">
                @foreach ($categories as $category)
                <div class="column is-3 has-text-left caviar">
                    @if ($category->category_name == 'Recepciones')
                    <figure class="image is-2by1">
                        <img src="{{ asset('images/muestras/recepciones.jpg')}}" alt="">
                    </figure>
                    <br>
                    <a class="has-text-dark" href="{{ route('user.receptions') }}">
                        <strong>{{ $category->category_name }}</strong>
                    </a>
                    <br>
                    @endif

                    @if ($category->category_name == 'Proveedores')
                    <figure class="image is-2by1">
                        <img src="{{ asset('images/muestras/proveedores.jpg')}}" alt="">
                    </figure>
                    <br>
                    <a class="has-text-dark" href="{{ route('user.providers') }}">
                        <strong>{{ $category->category_name }}</strong>
                    </a>
                    <br>
                    @endif

                    @if ($category->category_name == 'Novias')
                    <figure class="image is-2by1">
                        <img src="{{ asset('images/muestras/novia.jpg')}}" alt="">
                    </figure>
                    <br>
                    <a class="has-text-dark" href="{{ route('user.girlfriend') }}"><strong>{{ $category->category_name }}</strong></a>
                    <br>
                    @endif

                    @if ($category->category_name == 'Novios')
                    <figure class="image is-2by1">
                        <img src="{{ asset('images/muestras/novio.jpg')}}" alt="">
                    </figure>
                    <br>
                    <a class="has-text-dark" href="{{ route('user.boyfriend') }}"><strong>{{ $category->category_name }}</strong></a>
                    <br>
                    @endif

                    @foreach ($category->sectors as $sector)
                    <table class="text-center">
                        <tr>
                            <td> <a class="has-text-dark" href="{{ route('user.search','sector='.$sector->sector_name) }}">{{ $sector->sector_name }}</a>
                            </td>
                        </tr>
                    </table>
                    {{-- <a class="has-text-dark" href="{{ route('user.search','sector='.$sector->sector_name) }}">{{ $sector->sector_name }}</a>
                    --}}
                    @endforeach
                    </ul>
                </div>

                @endforeach

            </div>
        </div>
        <div class="column is-right"></div>
    </div>
</section>

<br>

<section class="has-background-white">

    <br><br><br>

    <div class="columns">
        <div class="column is-left"></div>
        <div class="column is-10 is-centered">

            <p class="title caviar">Empresas especializadas por region</p>
            <p class="caviar">Matrimonios Medellin</p>
            <p class="caviar">Matrimonios Cartagena</p>
            <p class="caviar">Matrimonios Bogota</p>

        </div>
        <div class="column is-right"></div>
    </div>
    <br>
    <br>

</section>

<section class="has-background-white-ter">

    <div class="columns">
        <div class="column is-one-quarter is-left"></div>
        <div class="column is-centered has-text-right">

            <div class="columns">
                <div class="column is-half"></div>
                <div class="column has-text-left">

                    <p><strong>Descarga la App</strong></p>

                    <br>

                    <a href="" id="store">
                        <figure class="image" style="max-width: 60%">
                            <img src="{{asset('images/follows/apps.png')}}">
                        </figure>
                    </a>
                    <br>
                    <a href="" id="store">
                        <figure class="image" style="max-width: 60%">
                            <img src="{{asset('images/follows/play.png')}}">
                        </figure>
                    </a>

                </div>
            </div>

        </div>
        <div class="column is-one-quarter is-right">

            <div class="columns">

                <div class="column is-half has-text-left">

                    <p><strong>Síguenos en</strong></p>

                    <br>
                    <ul>
                        <img class="icon" src="{{asset('images/follows/face.png')}}" href="">
                    </ul>
                    <ul>
                        <img class="icon" src="{{asset('images/follows/twit.png')}}" href="">
                    </ul>
                    <ul>
                        <img class="icon" src="{{asset('images/follows/insta.png')}}" href="">
                    </ul>
                    <ul>
                        <img class="icon" src="{{asset('images/follows/yout.png')}}" href="">
                    </ul>
                </div>
                <div class="column"></div>

            </div>

        </div>
    </div>

</section>

<br>

<footer style="background-color: #D7DBDD">

    <div class="container">

        <div class="columns">
            <div class="column is-one-quarter has-text-right">
                <img src="{{asset('images/EventosIntegrados.png')}}">
            </div>
            <div class="column is-one-quarter">

                <style type="text/css">
                    .derechos {
                        width: 100%;
                        height: auto;
                    }

                </style>

                <img id="derechos" src="{{asset('images/derechos.png')}}" href="">

            </div>
            <div class="column is-one-quarter">

                <p>Desarrollado por:</p>
                <img src="{{asset('images/ProMediosDigitales.png')}}" href="">

            </div>
            <div class="column is-one-quarter">

                <style type="text/css">
                    .contact {
                        width: 15%;
                        height: auto;
                    }

                </style>

                <!-- En el href colocar el enlace para las redes sociales de la pagina -->

                <img class="contact" src="{{asset('images/follows/what.png')}}" href="">
                <img class="contact" src="{{asset('images/follows/number.png')}}" href="">
                <img class="contact" src="{{asset('images/follows/email.png')}}" href="">

            </div>
        </div>

    </div>

</footer>

@endsection


@section('aditional_scripts')
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>

<script>
    $(function () {
        $('#searcher-sector').autocomplete({
            source: 'api/autocomplete/sector'
        });
    });


    $(function () {
        $('#searcher-name').autocomplete({
            source: 'api/autocomplete/name'
        });
    });

</script>
@endsection

@section('aditional_styles')
<link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" />
@endsection
