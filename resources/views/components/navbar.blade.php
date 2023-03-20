<nav class="navbar navbar-expand-lg sticky-top bg-white">
    <div class="container container-fluid">
        <a class="navbar-brand text-bold logo" href="{{ route('home') }}">BestChoice</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <button type="button" class="btn btn-warning btn-block my-btn-call nav col-lg-auto p-2 ml-2 justify-content-center">
                    <a href="{{ route('ads.create') }}"
                        class="text-decoration-none text-dark">{{ __('Crear anuncio') }}</a>
                </button>
            </ul>


            <ul class="navbar-nav me-2">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " id="navbarDropdown" role="button" href="#"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu"  aria-labelledby="navbarDropdown">
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
                <ul class="navbar-nav">

                    {{-- <li><a href="{{ route('login') }}" class="nav-link text-dark">{{ __('Iniciar sesión') }}</a></li> --}}
                    <a class="nav-link text-dark" data-bs-toggle="modal" href="#exampleModalToggle" role="button">{{__('Iniciar sesion')}}</a>
                    {{-- <li><a href="{{ route('register') }}" class="nav-link text-dark">{{ __('Registrar') }}</a></li> --}}
                </ul>
                @endguest
            </ul>

            <ul class="navbar-nav col-12 col-lg-auto p-2 ml-2">
                <li class="nav-item dropdown">
                    <a class="nav-link text-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span
                            class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span>
                        {{ Config::get('languages')[App::getLocale()]['display'] }}
                    </a>
                    <div class="dropdown-menu my-dropdown-width" aria-labelledby="navbarDropdownMenuLink">
                        @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span
                                class="flag-icon flag-icon-{{$language['flag-icon']}}"></span>
                            {{$language['display']}}</a>
                        @endif
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- Modal --}}


<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content form-login">
        <div class="modal-header d-flex justify-content-center" style="background-color:#d3a1a0;">
          <h5 class="modal-title animate__heartBeat animate__delay-3s" id="exampleModalToggleLabel">{{__('Iniciar sesión')}}</h5>
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
                    {{-- <h2 class="animate__heartBeat animate__delay-3s form-title d-flex justify-content-center">
                        {{__('Iniciar sesión')}}</h2> --}}
                    <label class="lable-login" for="username"></label>
                    <input class="input-login form-control forms_field-input border-0 " type="email" name="email" id="email"
                        placeholder="{{__('Tu correo')}}" data-rule="minlen:4" data-msg="Please enter at least 4 characters">
                    <div class="validate"></div>
                    <label lable-login for="password"></label>
                    <div class="pass">
                        <input type="password" class="input-login form-control forms_field-input border-0" name="password"
                            placeholder="{{__('Tu contraseña')}}" id="password">
                        <div class="validate"></div>
                        <i id="show-hide" class="fa-solid fa-eye-slash"></i>
                    </div>
                    <button type="submit" class="btn btn-login my-btn-call col-12 py-3 mt-5 text-dark justify-content-center" style="background-color:#d3a1a0;">{{__('Entrar')}}
                    </button>
                    <hr>
                    <div class="social-container">
                        <div class="social">
                            <div><a class="go" href=""><i class="fab fa-google"></i></a></div>
                            <div><a class="fb" href=""><i class="fab fa-facebook"></i></a></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer" style="background-color:#d3a1a0;">
            <p class="my-3 p-2 p-login">{{__('¿Aún no eres de los nuestros?')}} <a
                class="my-btn btn btn-outline-warning a-login btn-sm ms-2"
                href="{{ route('register') }}"data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">{{__('¡Registrate!')}}</a>
            </p>
          {{-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button> --}}
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade " id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content form-register">
        <div class="modal-header d-flex justify-content-center">
          <h5 class="modal-title animate__heartBeat animate__delay-3s" id="exampleModalToggleLabel2">{{__('Crear cuenta')}}</h5>

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
            <div>
                <form action="/register" method="POST" role="form">
                    {{-- <h2 class="animate__heartBeat animate__delay-3s form-title d-flex justify-content-center mb-4">
                        {{__('Crear cuenta')}}</h2> --}}
                    @csrf

                    {{-- Nombre --}}

                    <input type="text" name="name" id="name" class="input-register form-control forms_field-input border-0"
                        placeholder="{{__('Tu nombre')}}" data-rule="minlen:4" data-msg="Please enter at least 4 characters">
                    <div class="validate"></div>

                    {{-- Correo --}}

                    <input type="email" name="email" id="email" class="input-register form-control forms_field-input border-0 "
                        placeholder="{{__('Tu correo')}}" data-rule="minlen:4" data-msg="Please enter at least 4 characters">
                    <div class="validate"></div>

                    {{-- Contraseña --}}
                    <div class="pass">
                    <input type="password" name="password" id="password"
                        class=" input-register form-control forms_field-input border-0" placeholder="{{__('Tu contraseña')}}"
                        data-rule="minlen:4" data-msg="Please enter at least 4 characters">
                    <div class="validate"></div>
                    <i id="show-hide" class="fa-solid fa-eye-slash"></i>
                </div>
                    {{-- Confirmar contraseña --}}
                    <div class="pass">
                    <input type="password" name="password_confirmation" id="password"
                        class="form-control forms_field-input border-0 input-register"
                        placeholder="{{__('Tu contraseña, una vez más')}}" data-rule="minlen:4"
                        data-msg="Please enter at least 4 characters">
                    <div class="validate"></div>
                    <i id="show-hide" class="fa-solid fa-eye-slash"></i>
                </div>



                    <button type="submit" class="btn btn-login btn-warning my-btn-call col-12 py-3 justify-content-center text-decoration-none text-dark">
                        {{__('Crear cuenta')}}
                    </button>
                    <div class="social-container">
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <p class="my-3 p-2 d-flex">{{__('¿Ya eres de los nuestros?')}} <a
                class="my-btn btn btn-outline-warning a-login btn-sm ms-2"
                href="{{ route('login') }}" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">{{__('¡Entra ya!')}}</a>
            </p>
          {{-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button> --}}
        </div>
      </div>
    </div>
  </div>

  {{-- End Modal --}}
