<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ route('home') }}">
            <img src="{{asset('images/logo_2-01.png')}}">
        </a>
        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="menu">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="menu" class="navbar-menu is-uppercase">
        <div class="navbar-start">
            <a class="navbar-item century" href="{{ url('/user/'.auth()->user()->id.'/edit?data') }}">Tus datos</a>
            <a class="navbar-item century" href="{{ url('/user/'.auth()->user()->id.'/edit?photos') }}">Fotos</a>
            <a class="navbar-item century" href="{{ route('faq.index') }}">Faq</a>
            <a class="navbar-item century" href="{{ route('request.index') }}">Solicitudes</a>
        </div>

        <div class="navbar-end has-addons">
            <div class="navbar-item ">

                {{-- Si el usuario no se ha logeado mostrar login y registro a menos que este en el login--}}

                @guest

                <a class="button green_web century" href="{{ route('login') }}">Accede</a>
            </div>
            <div class="navbar-item ">
                <a class="button green_web century" href="{{ route('register') }}">Registrate</a>

                @endguest

                {{-- En caso de que se haya logeado mostrar el logout --}}

                @auth

                <div class="field">

                    <a class="button is-capitalzed" href="{{ route('user.show', auth()->user()->id .'?provider') }}">{{ auth()->user()->name }}</a>
                    <a class="button green_web century" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Salir</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>

                </div>

                @endauth

            </div>
        </div>
    </div>
</nav>
