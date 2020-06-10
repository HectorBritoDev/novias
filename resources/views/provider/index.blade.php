@extends('layouts.app')

@section('content')

<br>

<div class="container box is-radiusless">

    @if ($providers->count()==0)
    <p class="has-text-grey is-4">No hay coincidencias</p>
    @endif

    <div class="column">
        @include('provider.searchByName')
    </div>

    <div class="columns is-multiline">
        @foreach ($providers as $provider)
        <div class="column is-one-quarter has-text-centered">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src="{{ Storage::url($provider->provider_logo) }}" alt="logo">
                    </figure>
                </div>
                <div class="card-content">
                    <a class="has-text-dark" href="{{ url('/user/'.$provider->id.'?provider') }}"><strong>{{ $provider->name }}</strong></a>
                    <br>
                    {{ $provider->sector->sector_name }}
                    <br>
                    <p><strong>{{ $provider->municipio->full_municipio }}</strong></p>
                    <!-- <br>
					{{ $provider->provider_description }} -->

                    <p>Precio Desde:</p>
                    ${{ $provider->provider_min_cost }}
                    <br>

                </div>
                <div class="card-footer">
                    <div class="card-footer-item">
                        @auth
                        @if(auth()->user()->is_user)
                        @if ($user->where('provider_id',$provider->id)->first())
                        @include('likes.delete2')
                        @else
                        @include('likes.create2')
                        @endif
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection

@section('aditional_scripts')
<script src="{{ asset('js/select2.full.min.js') }}"></script>


<script>
    $(document).ready(function () {
        $('#searchByName').select2();
    });

</script>
@endsection

@section('aditional_styles')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection
