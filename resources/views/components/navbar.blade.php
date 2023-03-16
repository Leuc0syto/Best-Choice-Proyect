<nav class="navbar navbar-expand-lg">
    <div class="container container-fluid">
        <a class="navbar-brand text-bold logo" href="{{ route('home') }}">BestChoice</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item mt-2">
                    <x-locale lang="es" country="es" />
                </li>

                <li class="nav-item mt-2">
                    <x-locale lang="en" country="gb" />
                </li>

                <li class="nav-item mt-2">
                    <x-locale lang="ru" country="ru" />
                </li>
            </ul>
            <ul class="navbar-nav me-2">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " id="navbarDropdown" role="button" href="#"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (Auth::user()->is_revisor)
                        <li>
                            <a class="dropdown-item" href="{{ route('revisor.home') }}">
                                {{ __('Anuncios sin revisar') }}
                                <span class="badge rounded-pill bg-danger">
                                    {{ \App\Models\Ad::ToBeRevisionedCount() }}
                                </span>
                            </a>
                        </li>
                        @endif

                        <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a id="logoutBtn" class="dropdown-item" href="#">{{ __('Cerrar sesión') }}</a>
                        </form>
                    </ul>
                </li>

                @endauth
                @guest
                <ul class="nav col-12 col-lg-auto p-2 ml-2 justify-content-center">

                    <li><a href="{{ route('login') }}" class="nav-link text-dark">{{ __('Iniciar sesión') }}</a></li>
                    <li><a href="{{ route('register') }}" class="nav-link text-dark">{{ __('Registrar') }}</a></li>
                </ul>
                @endguest
            </ul>
            <button type="button" class="btn btn-secondary btn-block">
                <a href="{{ route('ads.create') }}"
                    class="text-decoration-none text-white">{{ __('Crear anuncio') }}</a>
            </button>
        </div>
    </div>
</nav>
