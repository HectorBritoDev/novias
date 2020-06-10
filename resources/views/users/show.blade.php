@extends('layouts.app')

@section('content')

<br>

<div class="container has-text-centered">
    @if (request()->has('provider') && $user->role==2)

    @include('provider.show')

    @else

    @if ($user->role !=0 )
    @include('users.showUser')
    @else
    @include('auth.login')
    @endif
    @endif


</div>

@endsection
