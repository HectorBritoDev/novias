@extends('layouts.app')

@section('content')

<section class="section">
    <div class="container">
        <table class="table is-bordered is-striped is-narrow is-fullwidth">
            <thead>
                <tr>
                    <th>Correo</th>
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if ($users->count()==0)
                    <td>No hay Usuarios registrados</td>
                    @endif
                    @foreach ($users as $user)
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td class="has-text-centered">@include('users.delete')</td>
                    @endforeach

                </tr>
            </tbody>
        </table>
    </div>    
</section>


@endsection
