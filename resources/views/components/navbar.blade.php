<nav class="navbar navbar-expand-lg bg-body-primary my-nav">
    <div class="container-fluid">
        <a class="navbar-brand text-white"  aria-current="page" href="{{ route('home') }}"><img src="{{-- {{asset('assets/img/logo.jpg')}} --}}" style="width: 120px">BestChoice</a>

            <ul class="navbar-nav">
                @auth
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Bienvenido {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a href="" class="dropdown-item">Mi zona</a></li>
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
                                onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Cerrar sesión</a>
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
                        data-bs-toggle="dropdown" aria-expanded="false">Bienvenido</a>

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

