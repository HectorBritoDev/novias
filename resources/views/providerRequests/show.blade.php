@extends('layouts.app')

@section('content')

<br>

<div class="container">
    <h1 class="title">Solicitantes</h1>

    <div>
        <table class="table is-striped is-narrow is-bordered is-fullwidth">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Datos</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    @if ($provider_request->user->role==0)
                    <td>
                        <strong>{{ $provider_request->applicant_name }}</strong>
                    </td>
                    @else
                    <td>
                        <a class="has-text-dark" href="{{ route('user.show',$provider_request->user->id) }}"><strong>{{ $provider_request->applicant_name }}</strong></a>
                    </td>
                    @endif


                    @if ($provider_request->user->role==0)
                    <td>
                        <p>ADMINISTRADOR</p>
                    </td>
                    @else
                    <td>
                        <p>{{ $provider_request->applicant_email }}</p>
                    </td>
                    @endif
                    <td class="has-text-centered">
                        <button class="button modal-button" data-target="#modal" aria-haspopup="true">

                            <span>Datos</span>

                        </button>
                        <div class="modal" id="modal">
                            <div class="modal-background"></div>
                            <div class="modal-content">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-header-title">
                                            <p class="title is-4">Datos de Evento</p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <br>
                                        <div class="container is-fluid has-tex-left">

                                            @if ($provider_request->user->role==0)
                                            @else
                                            <p><strong>Telefono:</strong></p>
                                            @endif
                                            <p>{{ $provider_request->applicant_phone }}</p>

                                            @if ($provider_request->user->role==0)
                                            <p><strong>Fecha de revision:</strong></p>
                                            @else
                                            <p><strong>Fecha para evento:</strong></p>
                                            @endif
                                            <p>{{ $provider_request->applicant_date }}</p>

                                            @if ($provider_request->user->role==0)
                                            @else
                                            <p><strong>Numero de invitados:</strong></p>
                                            @endif

                                            <p>{{ $provider_request->applicant_guests_number }}</p>
                                            <p><strong>Mensaje:</strong></p>
                                            <p>{{ $provider_request->applicant_comment }}</p>
                                        </div>

                                        <br>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <button class="modal-close is-large" aria-label="close"></button>
                        </div>
                    </td>

                </tr>
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    document.querySelectorAll('.modal-button').forEach(function (el) {
        el.addEventListener('click', function () {
            var target = document.querySelector(el.getAttribute('data-target'));

            target.classList.add('is-active');

            target.querySelector('.modal-close').addEventListener('click', function () {
                target.classList.remove('is-active');
            });
        });
    });

</script>

@endsection
