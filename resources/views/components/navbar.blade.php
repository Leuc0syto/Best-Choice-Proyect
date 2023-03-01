<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand"><img src="{{asset('assets/img/logo.jpg')}}" style="width: 120px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorías
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDorpdown">
                        @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="{{ 'category.ads' $category }}">{{ category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <div class="d-flex justify-content-center">
                    <a href="{{route('ads.create')}}"><button class="btn-create  py-1  mx-5 shadow" type="submit">Crear Anuncio</button></a>
                </div>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            <ul class="navbar-nav">
                @auth
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Bienvenido {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a href="" class="dropdown-item">Mi perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @if (Auth::user()->is_admin)
                        <li><a href="{{route('admin.dashboard')}}" class="dropdown-item">Panel del Administrador</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @endif
                        @if (Auth::user()->is_revisor)
                        <li><a href="{{route('revisor.dashboard')}}" class="dropdown-item">Panel del Revisor</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @endif
                        @if (Auth::user()->is_writer)
                        <li><a href="{{route('writer.dashboard')}}" class="dropdown-item">Panel del Redactor</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @endif

                        <li><a href="#" class="dropdown-item"
                                onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Salir</a>
                        </li>
                        <form action="{{ route('logout') }}" method="post" id="form-logout" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>
                @endauth
                @guest
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Bienvenido Invitado</a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a href="{{ route('register') }}" class="dropdown-item">Registrarse</a></li>
                        <li><a href="{{ route('login') }}" class="dropdown-item">Iniciar sesión</a></li>
                    </ul>
                </li>

                @endguest
            </ul>
        </div>
    </div>
</nav>
