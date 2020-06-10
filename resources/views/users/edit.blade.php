@extends('layouts.app')

@section('content')


@if(auth()->user()->is_provider && request()->has('photos'))
@include('provider.logos')


@elseif (auth()->user()->is_provider&& request()->has('data'))
@include('provider.edit')



@elseif (auth()->user()->is_user)
@include('users.editUserForm')

@else
@include('auth.login')

@endif


@endsection
