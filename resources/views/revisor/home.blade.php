<x-layout>
    <x-slot name='title'>BestChoice - Revisor Home</x-slot>
    @if ($ad)

    <div class='container my-3'>
        <div class='row'>
            <div class='col-12'>
                <div class="card">
                    <div class="card-header px-5" style="background-color: #F5DEC6">
                        {{__('Anuncio')}} #{{ $ad->id }}
                    </div>
                    <div class="card-body">
                        <div class="row mx-3">
                            <div class="col-md-3">
                                <b>{{__('Usuario')}}:</b>
                            </div>
                            <div class="col-md-9">
                                #{{ $ad->user->id }} - {{ $ad->user->name }} - {{ $ad->user->email }}
                            </div>
                            <hr>
                            <div class="col-md-3">
                                <b>{{__('Título')}}:</b>
                            </div>
                            <div class="col-md-9">
                                {{ $ad->title }}
                            </div>
                            <hr>
                            <div class="col-md-3">
                                <b>{{__('Precio')}}:</b>
                            </div>
                            <div class="col-md-9">
                                {{ __($ad->price) }}€
                            </div>
                            <hr>
                            <div class="col-md-3">
                                <b>{{__('Descripción')}}:</b>
                            </div>
                            <div class="col-md-9">
                                {{ __($ad->body) }}
                            </div>
                            <hr>
                            <div class="col-md-3">
                                <b>{{__('Categoría')}}:</b>
                            </div>
                            <div class="col-md-9">
                                {{ __($ad->category->name) }}
                            </div>
                            <hr>
                            <div class="col-md-3">
                                <b>{{__('Fecha de creación')}}:</b>
                            </div>
                            <div class="col-md-9">
                                {{ $ad->created_at }}
                            </div>
                            <hr>
                            <div class="col-md-3 mb-2">
                                <b>{{__('Imágenes') }}:</b>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    @forelse ($ad->images as $image)
                                    <div class="col-md-4">
                                        <img src="{{ $image->getUrl(400, 400) ?? 'https://via.placeholder.com/150'}}"
                                            class="card-img-top img-fluid" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <p class="mb-2"><b>{{__('Adultos')}}: </b><i class="bi bi-circle-fill {{ $image->adult }}"></i>
                                        [{{ $image->adult }}]<br></p>

                                        <p class="mb-2"><b>{{__('Degradante')}}: </b><i class="bi bi-circle-fill {{ $image->spoof }}"></i>
                                        [{{ $image->spoof }}] <br></p>

                                        <p class="mb-2"><b>{{__('Médico')}}: </b><i class="bi bi-circle-fill {{ $image->medical }}"></i>
                                        [{{ $image->medical }}] <br></p>

                                        <p class="mb-2"><b>{{__('Violencia')}}: </b><i class="bi bi-circle-fill {{ $image->violence }}"></i>
                                        [{{ $image->violence }}] <br></p>

                                        <p class="mb-2"><b>{{__('Racial')}}: </b><i class="bi bi-circle-fill {{ $image->racy }}"></i>
                                        [{{ $image->racy }}]
                                        <br></p>


                                        <p class="mb-2"><b>{{__('Etiquetas')}}: </b><br></p>
                                        @forelse ($image->getLabels() as $label)
                                        <a href="#" class="btn btn-warning btn-sm m-1">{{ $label }}</a>
                                        @empty
                                        No labels
                                        @endforelse
                                        <br><br>

                                        <p class="mb-2"><b>Id: </b>{{ $image->id }} <br></p>
                                        <p class="mb-2"><b>URI: </b>{{ Storage::url($image->path) }} <br></p>
                                    </div>
                                    <hr>

                                    @empty
                                    <div class="col-12">
                                        <b>{{__('No hay imágenes') }}</b>
                                    </div>
                                    @endforelse
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row my-3">

                    <form action="{{ route('revisor.ad.reject',$ad) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="d-md-block">
                            <div class="d-flex gap-2 ">
                                <button type="submit"
                                    class="btn btn-lg btn-outline-success flex-fill">{{__('Aceptar')}}</button>
                                <button type="submit"
                                    class="btn btn-lg btn-outline-danger flex-fill">{{__('Rechazar')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @else
        <h3 class="text-center mt-5">{{__('No hay anuncios para revisar, vuelve más tarde, gracias!')}}</h3>

        @endif
</x-layout>
