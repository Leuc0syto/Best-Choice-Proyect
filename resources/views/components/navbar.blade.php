<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light my-nav">
    <div class="container">
        <a class="navbar-brand text-bold logo" aria-current="page" href="{{ route('home') }}">BestChoice</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{__('Categorías')}}
                    </a>
                </li>
            </ul>
        </div>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($categories as $category)
            <li><a class="dropdown-item"
                    href="{{ route('category.ads', $category) }}">{{ $category->name }}</a>
            </li>
            @endforeach
        </ul>

        <form class="form-inline" role="search">
                <div class="box-src">
                    <input type="search" class="form-control form-control-dark text-bg-light"
                        placeholder="{{__('Buscar...')}}" aria-label="Search">
                </div>
        </form>

        <button type="button" class="btn btn-outline-warning btn-create"><a href="{{route('ads.create')}}"
                class="text-decoration-none text-white">{{__('Crear anuncio')}}</a></button>

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
                            {{__('Anuncios sin revisar')}}
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
                        <a id="logoutBtn" class="dropdown-item" href="#">{{__('Cerrar
                            sesión')}}</a>
                    </li>
                </ul>
            </li>

            @endauth
            @guest

            <ul class="nav col-12 col-lg-auto p-2 ml-2 justify-content-center">

                <li><a href="{{ route('login') }}" class="nav-link text-dark">{{__('Iniciar sesión')}}</a>
                </li>
                <li><a href="{{ route('register') }}" class="nav-link text-dark">{{__('Registrar')}}</a>
                </li>
            </ul>
            @endguest

            <li class="nav-item">
                <x-locale lang="es" country="es" />
            </li>

            <li class="nav-item">
                <x-locale lang="en" country="gb" />
            </li>

            <li class="nav-item">
                <x-locale lang="it" country="it" />
            </li>
        </ul>
    </div>

    </div>
</nav>
