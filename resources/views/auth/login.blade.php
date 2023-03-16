<x-layout>
    <x-slot name="title">Best Choice - Login</x-slot>

{{--     <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <h2 class="form-title space-around">{{__('Iniciar sesión')}}</h2>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="/login" method="POST" role="form" class="form-control">
                    @csrf
                    <div class="space-around my-2">
                        <input type="email" name="email" id="email" class="form-control forms_field-input"
                            placeholder="{{__('Tu correo')}}" data-rule="minlen:4" data-msg="Please enter at least 4 characters">
                        <div class="validate"></div>
                    </div>

                    <div class="space-around my-2">
                        <input type="password" name="password" id="password" class="form-control forms_field-input"
                            placeholder="{{__('Tu contraseña')}}">
                        <div class="validate">

                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">
                        {{__('Entrar')}}
                    </button>
                </form>
                <p class="my-3">{{__('¿Aún no eres de los nuestros?')}} <a class="btn btn-info btn-sm ms-2"
                        href="{{ route('register') }}">{{__('¡Registrate!')}}</a></p>
            </div>
        </div>
    </div> --}}



    {{--Login --}}
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
        <form action="/login" method="POST" role="form" class="form-login">
            @csrf
            <h2 class="form-title d-flex justify-content-center">{{__('Iniciar sesión')}}</h2>
            <label class="lable-login" for="username"></label>
            <input class="input-login form-control forms_field-input border-0 " type="email" name="email" id="email" placeholder="{{__('Tu correo')}}"data-rule="minlen:4" data-msg="Please enter at least 4 characters">
            <div class="validate"></div>
            <label lable-login for="password"></label>
            <div class="pass">

                <input type="password" class="pass form-control forms_field-input border-0" name="password" placeholder="{{__('Tu contraseña')}}" id="password">
                <div class="validate"></div>
                <i id="show-hide" class="fa-solid fa-eye-slash"></i>

            </div>
            <button class="btn-login py-3" type="submit">{{__('Entrar')}}</button>
            <hr>
            <div class="social-container">
                <div class="social">
                    <div><a class="go" href=""><i class="fab fa-google"></i></a></div>
                    <div><a class="fb" href=""><i class="fab fa-facebook"></i></a></div>
                </div>
                <p class="my-3 p-2 p-login">{{__('¿Aún no eres de los nuestros?')}} <a class="btn-create btn btn-outline-warning a-login btn-sm ms-2"
                    href="{{ route('register') }}">{{__('¡Registrate!')}}</a></p>
            </div>
        </form>
    </div>
    

</x-layout>
