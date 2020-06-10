<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


    <head>

        <meta charset="utf-8">
        <meta name="viewport" ntent="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Novias Colombia</title>
        {{--<link rel="shortcut icon" href="{{ asset('images/icon.png')}}" />--}}
        <link rel="shortcut icon" type="image/png" href="{{asset('images/logo_ico.ico')}}"/>
        @yield('bae')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script defer src="{{ asset('js/font-awesome.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/modal-fx.min.js') }}"></script>

        @yield('aditional_scripts')
        <!-- Fonts -->

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @yield('aditional_styles')

    </head>

    <body>
        @include('sweetalert::alert')
        @guest
        @include('layouts.navbarUsers')
        @endguest

        @auth
        @if (auth()->user()->is_admin)
        @include('layouts.navbarAdmin')
        @elseif(auth()->user()->is_provider)
        @include('layouts.navbarProvider')
        @else
        @include('layouts.navbarUsers')
        @endif
        @endauth

        @yield('content')

    </body>
    <script type="text/javascript">
        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach(el => {
                el.addEventListener('click', () => {

                    // Get the target from the "data-target" attribute
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);

                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    </script>

</html>
