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
            <a class="navbar-item century" href="{{ route('taskCategory.index') }}">Categorias para tareas</a>
            <a class="navbar-item century" href="{{ route('color.index') }}">Colores</a>
            <a class="navbar-item century" href="{{ route('weather.index') }}">Clima</a>
            <a class="navbar-item century" href="{{ route('style.index') }}">Estilos</a>
            <a class="navbar-item century" href="{{ route('user.index') }}">Usuarios</a>
            <a class="navbar-item century" href="{{ route('sector.index') }}">Sectores</a>
            <a class="navbar-item century" href="{{ route('user.adminProviders') }}">Proveedores</a>
            <a class="navbar-item century" href="{{ route('blog.index') }}">Blog</a>
            <a class="navbar-item century" href="{{ route('tag.index') }}">Etiquetas para blog</a>
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

                    <a class="button is-capitalzed" href="#">{{ auth()->user()->name }}</a>
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
