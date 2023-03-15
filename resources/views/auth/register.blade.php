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
                    <h2 class="form-title space-around">{{__('Crear cuenta')}}</h2>
                    @csrf
                    <div class="space-around my-2 input-login">
                        <input type="text" name="name" id="name" class="form-control forms_field-input"
                            placeholder="{{__('Tu nombre')}}" data-rule="minlen:4" data-msg="Please enter at least 4 characters">
                        <div class="validate"></div>
                    </div>

                    <div class="space-around my-2 input-login">
                        <input type="email" name="email" id="email" class="form-control forms_field-input"
                            placeholder="{{__('Tu correo')}}" data-rule="minlen:4" data-msg="Please enter at least 4 characters">
                        <div class="validate"></div>
                    </div>

                    {{-- Contraseña --}}
                    <div class="space-around my-2 input-login">
                        <input type="password" name="password" id="password" class="form-control forms_field-input"
                            placeholder="{{__('Tu contraseña')}}" data-rule="minlen:4"
                            data-msg="Please enter at least 4 characters">
                        <div class="validate"></div>
                    </div>
                    {{-- Confirmar contraseña --}}
                    <div class="space-around my-2 input-login">
                        <input type="password" name="password_confirmation" id="password"
                            class="form-control forms_field-input" placeholder="{{__('Tu contraseña, una vez más')}}"
                            data-rule="minlen:4" data-msg="Please enter at least 4 characters">
                        <div class="validate"></div>
                    </div>

                    <button type="submit" class="form-button-edit text-center space-around my-2 btn-login">{{__('Crear cuenta')}}</button>
                    <div class="form-link d-flex">
                        <p class="my-3 p-2 d-flex">{{__('¿Ya eres de los nuestros?')}}<a class="btn-create a-register btn btn-outline-warning d-flex justify-content-between btn-sm ms-2"
                        href="{{ route('login') }}">{{__('¡Entra ya!')}}</a></p>
                    </div>
                </form>
            </div>
</x-layout>
