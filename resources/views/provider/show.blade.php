@auth

@if (auth()->user()->is_user)
@if ($like)
@include('likes.delete')
@else
@include('likes.create')
@endif
@endif
@if (auth()->user()->is_admin)
<div class="buttons is-centered">
    @include('provider.changeStatus')
</div>
@endif

@endauth

<p class="title">{{ $user->name }}</p>

<br>

<div class="container is-fluid has-text-left">
    <p><strong>{{ $user->provider_adress }} {{ $user->municipio->full_municipio }}</strong></p>
    <p><strong>Cotizaciones desde:</strong> $ {{ $user->provider_min_cost }}</p>
</div>


<section class="section ">

    <div class="content has-text-left">
        <p class="title is-4"><strong>Fotos</strong></p>
    </div>

    <div class="container">
        <div class="columns">
            <div class="column is-8">

                <div class="owl-carousel owl-theme">
                    @foreach ($photos as $photo)
                    <div class="item">
                        <figure class="image">
                            <img class="" src="{{ Storage::url($photo->photo)  }}">
                        </figure>
                    </div>
                    @endforeach
                </div>

                @if ($user->video)

                <div class="content has-text-left">
                    <p class="title is-4"><strong>Video</strong></p>
                </div>

                <iframe width="360" height="215" src="https://www.youtube.com/embed/{{$user->video->url}}" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                @endif

                <br><br>
                <div class="content has-text-left">
                    <p><strong>Informacion sobre {{ $user->name }}</strong></p>
                    <p>{{ $user->provider_description }}</p>
                </div>

                <div class="content has-text-left">
                    <p><strong>Mas Informacion sobre el proveedor</strong></p>

                    @foreach ($faqs as $faq)
                    <div class="field is-horizontal">
                        <div class="field">
                            <p class="has-text-danger">+</p>
                        </div>
                        <div class="field">
                            <p><strong>{{ $faq->question }}:</strong> {{ $faq->answer }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="column is-4  has-text-centered">
                <div class="content box is-radiusless has-background-grey-lighter">
                    @guest
                    <p><strong>Solicitar Cotización</strong></p>
                    <br>
                    @endguest
                    @auth
                    @if (auth()->user()->is_user)
                    <p><strong>Solicitar Cotización</strong></p>
                    <br>
                    @elseif(auth()->user()->is_user)
                    <p><strong>Solicitar Cotización</strong></p>
                    <br>

                    @else
                    <p><strong>Notas de Revisión</strong></p>
                    <br>
                    @endif
                    @endauth

                    @guest
                    @include('providerRequests.create')
                    @endguest

                    @auth
                    @if (auth()->user()->is_admin)
                    @include('providerRequests.adminCreate')
                    @else
                    @include('providerRequests.create')
                    @endif
                    @endauth
                </div>


            </div>
        </div>
    </div>

</section>

{{-- SCRIPT DE CAROUSEL --}}
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true
    });

</script>

@section('bae')
<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('css/owl.theme.default.css') }}">
@endsection


@section('aditional_scripts')
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
@endsection
