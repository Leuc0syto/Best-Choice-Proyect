<x-layout>
    <x-slot name="title">Best Choice - Login</x-slot>

    <div class="container col-md-6 my-3">
        <div class="d-flex justify-content-center">
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
                        <p class=" mt-5 px-5 d-flex justify-content-center">{{ __('¿Aún no eres de los nuestros?') }}
                        </p>
                        <a class="my-btn btn btn-outline-warning a-login btn-sm mx-auto" href="{{ route('register') }}"
                            data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
                            data-bs-dismiss="modal">{{ __('¡Registrate!') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
