<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="">
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
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link is-arrowless century" href="{{ route('marrige.index') }}">
                    mi matrimonio
                </a>

                <div class="navbar-dropdown is-capitalized ">
                    <a class="navbar-item century" href="{{ route('task.index') }}">
                       <span class="century"> tareas</span>
                    </a>
                    <a class="navbar-item century" href="{{ route('guest.index') }}">
                        invitados
                    </a>
                    <a class="navbar-item " href="{{ route('budget.index') }}">
                        presupuesto
                    </a>
                    <a class="navbar-item " href="{{ route('user.bySector') }}">
                        Proveedores
                    </a>
                    <a class="navbar-item " href="{{ route('album.index') }}">
                        Album
                    </a>

                </div>
            </div>

            <a class="navbar-item century" href="{{ route('user.receptions') }}">recepciones</a>

            <a class="navbar-item century" href="{{ route('user.providers') }}">proveedores</a>

            <a class="navbar-item century" href="{{ route('user.girlfriend') }}">novias</a>

            <a class="navbar-item century" href="{{ route('user.boyfriend') }}">novios</a>

            <a class="navbar-item century" href="{{ route('blog.index') }}">Ideas</a>

            @auth
            @if (auth()->user()->is_user)
            <a class="navbar-item century" href="{{ route('like.index') }}">Mis Proveedores</a>
            @endif

            @endauth

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

                    <a class="button is-capitalzed" href="{{ url('user/'. auth()->user()->id) }}">{{ auth()->user()->name }}</a>
                    <a class="button green_web" href="{{ route('logout') }}" onclick="event.preventDefault();
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
