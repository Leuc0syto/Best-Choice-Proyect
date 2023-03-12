<x-layout>
    <x-slot name="title">Best Choice - Register</x-slot>

    <section class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <h2 class="form-title space-around">{{__('Crear cuenta')}}</h2>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="/register" method="POST" role="form" class="form-control">
                    @csrf
                    <div class="space-around my-2">
                        <input type="text" name="name" id="name" class="form-control forms_field-input"
                            placeholder="{{__('Tu nombre')}}" data-rule="minlen:4" data-msg="Please enter at least 4 characters">
                        <div class="validate"></div>
                    </div>

                    <div class="space-around my-2">
                        <input type="email" name="email" id="email" class="form-control forms_field-input"
                            placeholder="{{__('Tu correo')}}" data-rule="minlen:4" data-msg="Please enter at least 4 characters">
                        <div class="validate"></div>
                    </div>

                    {{-- Contraseña --}}
                    <div class="space-around my-2">
                        <input type="password" name="password" id="password" class="form-control forms_field-input"
                            placeholder="{{__('Tu contraseña')}}" data-rule="minlen:4"
                            data-msg="Please enter at least 4 characters">
                        <div class="validate"></div>
                    </div>
                    {{-- Confirmar contraseña --}}
                    <div class="space-around my-2">
                        <input type="password" name="password_confirmation" id="password"
                            class="form-control forms_field-input" placeholder="{{__('Tu contraseña, una vez más')}}"
                            data-rule="minlen:4" data-msg="Please enter at least 4 characters">
                        <div class="validate"></div>
                    </div>

                    <button type="submit" class="form-button-edit text-center space-around my-2 btn btn-info">{{__('Crear cuenta')}}</button>
                </form>

                <div class="form-link d-flex">
                        <p class="my-3">{{__('¿Ya eres de los nuestros?')}}<a class="btn btn-info btn-sm ms-2"
                                href="{{ route('login') }}">{{__('¡Entra ya!')}}</a></p>
                </div>
            </div>
        </div>
    </section>
</x-layout>
