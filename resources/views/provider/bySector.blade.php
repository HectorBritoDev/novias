@extends('layouts.app')

@section('content')

<br>

<div class="container">
    <div class="columns is-multiline">
        @foreach ($sectors as $sector)
        <div class="column is-one-fifth">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-square">
                        <img src="{{ Storage::url($sector->icon) }}" width="100px" alt="icon">
                    </figure>
                </div>
                <div class="card-body has-text-centered">

                    <p><strong>{{ $sector->sector_name }}</strong></p>

                    @if ($likes->where('sector_id',$sector->id)->count()==0)
                    <br>
                    @include('provider.search')
                    @else
                    <p><strong>
                            <a class="has-text-danger" href="{{ route('like.show',$sector->id) }}">{{ $likes->where('sector_id',$sector->id)->count() }}</a>
                        </strong></p>
                    @endif
                    <br>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>






@endsection
