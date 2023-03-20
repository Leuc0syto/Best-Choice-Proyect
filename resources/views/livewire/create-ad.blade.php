<div class="container-fluid vh-100">
    <div class="rounded d-flex justify-content-center">
        <div class="col-md-4 d-sm-none d-md-block">
            <img src="{{ asset('assets/img/Shopping-rafiki.png') }}" class="w-100 img-fluid" alt="image">
        </div>
        <div class="col-md-4 col-sm-12 p-5">
            <div class="text-center">
                <h2 class=" animate__heartBeat animate__delay-3s form-title d-flex justify-content-center mb-4 pt-4">
                    {{ __('Sube tu anuncio') }}</h2>
            </div>
            <div class="form-create">
                @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
                @endif

                <form class="" wire:submit.prevent="store">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label lable-login">{{ __('Título:') }} </label>
                        <input wire:model="title" type="text"
                            class="form-control input-login @error('title') is-invalid @enderror">
                        @error('title')
                        {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label lable-login ">{{ __('Precio:') }} </label>
                        <input wire:model="price" type="number" min="0"
                            class="form-control input-login @error('price') is-invalid @enderror">
                        @error('price')
                        {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label lable-login">{{ __('Descripción:') }} </label>
                        <textarea wire:model="body" cols="20" rows="5"
                            class=" input-login form-control  @error('body') is-invalid @enderror"></textarea>
                        @error('body')
                        {{ $message }}
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label lable-login">{{ __('Categorías:') }} </label>
                        <select wire:model.defer="category" class="form-control input-login">
                            <option value="">{{ __('Seleccionar Categoría') }}</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ __($category->name) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <input wire:model="temporary_images" type="file" name="images" multiple
                            class="form-control in input-login @error('temporary_images.*') is-invalid @enderror">
                        @error('temporary_images.*')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    @if (!empty($images))
                    <div class="row">
                        <div class="col-12">
                            <p>{{ __('Vista previa') }}:</p>
                            <div class="row">
                                @foreach ($images as $key => $image)
                                <div class="col-12 col-md-4">
                                    <img src="{{ $image->temporaryUrl() }}" alt="" class="img-fluid">
                                    <button type="button" class="btn btn-danger"
                                        wire:click="removeImage({{ $key }})">{{ __('Eliminar') }}</button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="my-3 d-flex justify-content-center">
                        <button type="submit"
                            class="btn btn-login btn-warning my-btn-call text-black col-12 py-3 justify-content-center">{{ __('Crear') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
