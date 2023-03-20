<x-layout>
    <x-slot name="title">Best Choice - Register</x-slot>



    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-register">
        <form action="/register" method="POST" role="form" class="form-login">
            <h2 class="animate__heartBeat animate__delay-3s form-title d-flex justify-content-center mb-4">
                {{__('Crear cuenta')}}</h2>
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
                <p class="my-3 p-2 d-flex">{{__('¿Ya eres de los nuestros?')}} <button type="submit"
                        class="my-btn btn btn-outline-warning a-login btn-sm ms-2"
                        href="{{ route('login') }}">{{__('¡Entra ya!')}}</button>
                </p>
            </div>
        </form>
    </div>
</x-layout>
