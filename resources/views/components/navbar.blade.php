<nav class="navbar navbar-expand-lg my-nav">
    <div class="container">
        <a class="navbar-brand text-bold logo" aria-current="page" href="{{ route('home') }}">BestChoice</a>

          {{--  CATEGORIAS DAR FRONT--}}
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorías
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                        <li><a class="dropdown-item" href="{{ route('category.ads', $category) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
        <div class="d-flex justify-content-start">
            <form class="col-12" role="search">
                <div class="box-src">
                    <input type="search" class="form-control form-control-dark text-bg-light"
                        placeholder="Buscar..." aria-label="Search">
                </div>
            </form>
        </div>
        {{-- <div class="create-btn">
            <button><a class="create-btn" href="{{route('ads.create')}}"><i class="fa-solid fa-plus"> Crear anuncio</i></a></button>
        </div> --}}
        <button type="button" class="btn btn-outline-warning btn-create">Crear anuncio</button>



        {{-- FIN CATEGORIAS --}}
        <ul class="navbar-nav">
            @auth
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle " id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Bienvenido {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu position-absolute droptrue" aria-labelledby="navbarDropdown">
                        <li><a href="" class="dropdown-item">Mi zona</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        @if (Auth::user()->is_admin)
                            <li><a href="{{ route('admin.dashboard') }}" class="dropdown-item">Panel del Administrador</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endif
                        @if (Auth::user()->is_revisor)
                            <li><a href="{{ route('revisor.dashboard') }}" class="dropdown-item">Panel del Revisor</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endif
                        @if (Auth::user()->is_writer)
                            <li><a href="{{ route('writer.dashboard') }}" class="dropdown-item">Panel del Redactor</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endif

                        <li><a href="#" class="dropdown-item"
                                onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Cerrar
                                sesión</a>
                        </li>
                        <form action="{{ route('logout') }}" method="post" id="form-logout" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>

            @endauth
            @guest

                    <ul class="nav col-12 col-lg-auto p-2 ml-2 justify-content-center">

                        <li><a href="{{ route('login') }}" class="nav-link text-dark">Iniciar sesión</a></li>
                        <li><a href="{{ route('register') }}" class="nav-link text-dark">Registrarse</a></li>
                    </ul>
            @endguest
        </ul>
    </div>
    </div>
</nav>
