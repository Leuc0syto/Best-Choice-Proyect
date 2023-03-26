<nav class="navbar navbar-expand-lg sticky-top bg-white">
    <div class="container container-fluid">
        <a class="navbar-brand text-bold logo" href="{{ route('home') }}">BestChoice</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                <button type="button"
                    class="btn btn-warning btn-block my-btn-call nav col-lg-auto p-2 ml-2 justify-content-center">
                    <a href="{{ route('ads.create') }}"
                        class="text-decoration-none text-dark">{{ __('Crear anuncio') }}</a>
                </button>
                @endauth
            </ul>

            <div class="d-flex flex-row align-items-center">
                <div class="col-6">
                    <ul class="navbar-nav me-2">
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle " id="navbarDropdown" role="button" href="#"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                    href="{{ route('favorite.ad')}}">{{ __('Listado de favoritos')}}
                                    <span class="badge rounded-pill bg-danger">
                                        {{ \App\Models\Ad::favoritedCount() }}
                                    </span>
                                </a>
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
                                @if(Auth::user()->is_admin)
                                <a class="dropdown-item"
                                    href="{{ route('admin.home')}}">{{ __('Panel del administrador')}}
                                </a>
                                @endif

                                <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a id="logoutBtn" class="dropdown-item" href="#">{{ __('Cerrar sesión') }}</a>
                                </form>
                </div>
                {{-- Cesta de la compra --}}
                <div class="dropdown dropdown-menu-md-end m-0 p-0 container-cart">
                    <button class="me-4 border-0 bg-white" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @if (\App\Models\Ad::itemToCartCount() == 0)
                        <i class=" fas fa-regular fa-cart-shopping" style="color: #ffc106;"></i>
                        <span class="d-none"></span>
                        @else
                        <span class="position-absolute cart-count-item text-dark">
                            {{ \App\Models\Ad::itemToCartCount() }}
                        </span>

                            <i class="ms-3 fas fa-regular fa-cart-shopping" style="color: #ffc106;"></i>
                        @endif
                    </button>
                    <div class="dropdown-menu dropdown-menu-end m-0 p-0 bg-light" aria-labelledby="dropdownMenuButton">
                        <livewire:cart-dropdown />
                    </div>
                    {{-- Fin cesta de la compra --}}
                    </ul>
                    </li>

                    @endauth
                    @guest
                    <ul class="navbar-nav">
                        <a class="nav-link text-dark" data-bs-toggle="modal" href="#exampleModalToggle"
                            role="button">{{ __('Iniciar sesión') }}</a>
                    </ul>
                    @endguest
                    </ul>
                </div>

                {{-- Desplegable idioma --}}
                <div class="col-6 text-end">
                    <ul class="navbar-nav col-12 col-lg-auto p-2 ml-2">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-dark dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span
                                    class="flag-icon flag-icon-{{ Config::get('languages')[App::getLocale()]['flag-icon'] }}"></span>
                                {{ Config::get('languages')[App::getLocale()]['display'] }}
                            </a>
                            <div class="dropdown-menu my-dropdown-width" aria-labelledby="navbarDropdownMenuLink">
                                @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span
                                        class="flag-icon flag-icon-{{ $language['flag-icon'] }}"></span>
                                    {{ $language['display'] }}</a>
                                @endif
                                @endforeach
                            </div>
                        </li>
                    </ul>
                </div>
                {{-- Acaba desplegable idioma --}}
            </div>
        </div>
    </div>
</nav>

{{-- Modal --}}
{{-- Login Modal --}}
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content form-login">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title animate__heartBeat animate__delay-3s" id="exampleModalToggleLabel">
                    {{ __('Iniciar sesión') }}</h5>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-container">
                    <form action="/login" method="POST" role="form">
                        @csrf
                        {{-- <label for="email" class="form-label lable-login ">{{ __('Correo:') }} </label> --}}
                        <input class="input-login form-control forms_field-input border-0" type="email" name="email"
                            id="email" placeholder="{{ __('Tu correo') }}" data-rule="minlen:4"
                            data-msg="Please enter at least 4 characters">
                        <div class="validate"></div>
                        <label lable-login for="password"></label>
                        <div class="pass">
                            <input type="password" class="input-login form-control forms_field-input border-0"
                                name="password" placeholder="{{ __('Tu contraseña') }}" id="password">
                            <div class="validate"></div>
                            <i id="show-hide" class="fa-solid fa-eye-slash"></i>
                        </div>
                        <button type="submit"
                            class="btn btn-login btn-warning my-btn-call col-12 py-3 mt-5 text-dark justify-content-center">{{ __('Entrar') }}
                        </button>
                        <hr>
                        <div class="social-container">
                            <div class="social">
                                <div><a class="go" href=""><i class="fab fa-google"></i></a></div>
                                <div><a class="fb" href=""><i class="fab fa-facebook"></i></a></div>
                            </div>
                            <p class="my-5 px-5 d-flex justify-content-center">{{ __('¿Aún no eres de los nuestros?') }}
                                <a class="my-btn btn btn-outline-warning a-login btn-sm ms-2"
                                    href="{{ route('register') }}" data-bs-target="#exampleModalToggle2"
                                    data-bs-toggle="modal" data-bs-dismiss="modal">{{ __('¡Registrate!') }}</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Create Account Modal --}}
<div class="modal fade " id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content form-register">
            <div class="modal-header d-flex justify-content-center">
                <h5 class="modal-title animate__heartBeat animate__delay-3s" id="exampleModalToggleLabel2">
                    {{ __('Crear cuenta') }}</h5>
            </div>
            <div class="modal-body label-login">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div>
                    <form action="/register" method="POST" role="form">
                        @csrf

                        {{-- Nombre --}}

                        <input type="text" name="name" id="name"
                            class="input-register form-control forms_field-input border-0"
                            placeholder="{{ __('Tu nombre') }}" data-rule="minlen:4"
                            data-msg="Please enter at least 4 characters">
                        <div class="validate"></div>


                        {{-- Correo --}}

                        <input type="email" name="email" id="email"
                            class="input-register form-control forms_field-input border-0 "
                            placeholder="{{ __('Tu correo') }}" data-rule="minlen:4"
                            data-msg="Please enter at least 4 characters">
                        <div class="validate"></div>

                        {{-- Contraseña --}}
                        <div class="pass">
                            <input type="password" name="password" id="password"
                                class=" input-register form-control forms_field-input border-0"
                                placeholder="{{ __('Tu contraseña') }}" data-rule="minlen:4"
                                data-msg="Please enter at least 4 characters">
                            <div class="validate"></div>
                            <i id="show-hide" class="fa-solid fa-eye-slash"></i>
                        </div>
                        {{-- Confirmar contraseña --}}
                        <div class="pass">
                            <input type="password" name="password_confirmation" id="password"
                                class="form-control forms_field-input border-0 input-register"
                                placeholder="{{ __('Tu contraseña, una vez más') }}" data-rule="minlen:4"
                                data-msg="Please enter at least 4 characters">
                            <div class="validate"></div>
                            <i id="show-hide" class="fa-solid fa-eye-slash"></i>
                        </div>



                        <button type="submit"
                            class="btn btn-login btn-warning my-btn-call col-12 py-3 mt-4 text-dark justify-content-center">
                            {{ __('Crear cuenta') }}
                        </button>
                        <div class="social-container">
                            <p class="my-5 px-5 d-flex justify-content-center">{{ __('¿Ya eres de los nuestros?') }} <a
                                    class="my-btn btn btn-outline-warning a-login btn-sm ms-2"
                                    href="{{ route('login') }}" data-bs-target="#exampleModalToggle"
                                    data-bs-toggle="modal" data-bs-dismiss="modal">{{ __('Identifícate!') }}</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Modal --}}
