@extends('layouts.app')

@section('content')

<br>

<div class="container box is-radiusless">
    <p class="title">Solicitudes</p>

    <table class="table is-narrow is-fullwidth is-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Descripcion</th>
                <th>invitados</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @if ($provider_requests->count()==0)
            <tr>
                <td>No tienes solicitudes</td>
            </tr>
            @endif

            @foreach ($provider_requests as $provider_request)

            @if ($provider_request->user->role==0)

            <tr>
                <td><a class="has-text-dark" href="{{ route('request.show',$provider_request->id) }}"><strong> {{ $i=$i+1 }}</strong></a></td>
                <td>ADMINISTRADOR</td>
                <td>{{ str_limit($provider_request->applicant_comment,30) }}</td>
                <td>{{ $provider_request->applicant_guests_number }}</td>
                <td>@include('providerRequests.delete')</td>
            </tr>
            @else
            <tr>
                <td><a class="has-text-dark" href="{{ route('request.show',$provider_request->id) }}"><strong> {{ $i=$i+1 }}</strong></a></td>
                <td>{{ $provider_request->applicant_email }}</td>
                <td>{{ str_limit($provider_request->applicant_comment,30) }}</td>
                <td>{{ $provider_request->applicant_guests_number }}</td>
                <td>@include('providerRequests.delete')</td>
            </tr>
            @endif
            @endforeach
            <tr>
                <td>{{ $provider_requests->render() }}</td>
            </tr>
        </tbody>

    </table>
</div>

@endsection
