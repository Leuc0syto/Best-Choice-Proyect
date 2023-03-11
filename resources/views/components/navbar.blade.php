<nav class="navbar navbar-expand-lg my-nav">
    <div class="container">
        <a class="navbar-brand text-bold logo" aria-current="page" href="{{ route('home') }}">BestChoice</a>

        {{--  CATEGORIAS DAR FRONT --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('Categorías') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="{{ __('navbarDropdown') }}">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{ route('category.ads', $category) }}">{{ __($category->name) }}</a></li>
                        @endforeach
                    </ul>

                </li>
            </ul>
        </div>
        <div class="d-flex justify-content-start">
            <form class="col-12" role="search">
                <div class="box-src">
                    <input type="search" class="form-control form-control-dark text-bg-light"
                        placeholder="{{ __('Buscar...') }}" aria-label="Search">
                </div>
            </form>
        </div>

        <button type="button" class="btn btn-outline-warning btn-create"><a href="{{ route('ads.create') }}"
                class="text-decoration-none text-white">{{ __('Crear anuncio') }}</a></button>

        <ul class="navbar-nav">
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

                        <li>
                            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                            <a id="logoutBtn" class="dropdown-item"
                                href="#">{{ __('Cerrar sesión') }}</a>
                        </li>
                    </ul>
                </li>

            @endauth
            @guest

                <ul class="nav col-12 col-lg-auto p-2 ml-2 justify-content-center">

                    <li><a href="{{ route('login') }}" class="nav-link text-dark">{{ __('Iniciar sesión') }}</a></li>
                    <li><a href="{{ route('register') }}" class="nav-link text-dark">{{ __('Registrar') }}</a></li>
                </ul>
            @endguest

            <li class="nav-item mt-2">
                <x-locale lang="es" country="es" />
            </li>

            <li class="nav-item mt-2">
                <x-locale lang="en" country="gb" />
            </li>

            <li class="nav-item mt-2">
                <x-locale lang="it" country="it" />
            </li>
        </ul>
    </div>
    </div>
</nav>
