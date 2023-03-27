<x-layout>
    <div class="container my-3">
        <div class="card mx-auto col-l-9 col-md-7">
            <div class="card-header" style="background-color: #F5DEC6">
                <div class="d-flex">
                        <img src="{{ asset('assets/img/default-profile-icon.jpg') }}" class="rounded-circle"
                            style="width: 60px;" alt="Avatar">
                        <a class="text-decoration-none text-dark my-auto mx-3" href="">{{ $ad->user->name }}</a>
                    {{-- Funciones Favoritos --------------------------------------------------------------------------------------}}
                    @auth
                    @if (Auth::user()->id != $ad->user->id)
                    @forelse (Auth::user()->favoriteAds as $favorite_ad)
                    @if ($favorite_ad->id == $ad->id)
                    <p class="ms-auto my-auto d-flex justify-content-end text-danger"></i>
                        {{ __('Anuncio marcado como favorito')}}</i></p>
                    <form action="{{ route('favorite.ad.reject', $ad)}}" method="POST"
                        class="d-flex justify-content-end">
                        @method('PATCH')
                        @csrf
                        <button type="submit" class="btn btn-white fs-2"><i class="fa-solid fa-heart"
                                style="color: #ff0000;"></i></button>
                    </form>
                    @break
                    @else
                    @if ($favorite_ad == Auth::user()->favoriteAds[(count(Auth::user()->favoriteAds)-1)])
                    <p class="ms-auto d-flex justify-content-end text-danger">
                        <form action="{{ route('favorite.ad.accept', $ad)}}" method="POST"
                            class="d-flex justify-content-end">
                            @method('PATCH')
                            @csrf
                            <button type="submit" class="ms-auto btn btn-white text-danger rounded fs-2"><i
                                    class="fa-regular fa-heart" style="color: #ff0000;"></i>
                            </button>
                    </p>
                    </form>
                    @break
                    @endif
                    @endif

                    @empty
                    <p class="ms-auto d-flex justify-content-end text-danger">
                        <form action="{{ route('favorite.ad.accept', $ad)}}" method="POST"
                            class="d-flex justify-content-end">
                            @method('PATCH')
                            @csrf
                            <button type="submit" class="btn btn-white text-danger rounded fs-2">
                                <i class="fa-regular fa-heart" style="color: #ff0000;"></i></button>
                    </p>
                    </form>
                    @endforelse
                    @endif
                    @endauth
                    {{-- Acaba funciones Favoritos --------------------------------------------------------------------------------------}}

                </div>

            </div>
            <div id="adImages" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    @for ($i = 0; $i < $ad->images()->count(); $i++)
                        <button type="button" data-bs-target="#adImages" data-bs-slide-to="{{ $i }}"
                            class="@if ($i == 0) active @endif" aria-current="true"
                            aria-label="Slide {{ $i + 1 }}"></button>
                        @endfor

                </div>
                <div class="carousel-inner">
                    @foreach ($ad->images as $image)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img src="{{ $image->getUrl(400, 400)}}" class="d-block w-100" alt="">
                    </div>
                    @endforeach

                    <button class="carousel-control-prev" type="button" data-bs-target="#adImages" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#adImages" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <h2 class="card-title">{{ $ad->price }}{{__('€')}}</h2>
                <h5 class="card-title">{{ $ad->title }}</h5>
                <p class="card-text">{{ $ad->body }}</p>
                <a class="btn btn-outline-secondary rounded-pill btn-sm my-2"
                    href="{{route('category.ads',$ad->category)}}">{{__($ad->category->name)}}</a>
                <p class="card-text"><small class="text-muted">{{__('Publicado el')}}:
                        {{ $ad->created_at->format('d/m/Y') }}</small></p>


                @auth
                @if (Auth::user()->id != $ad->user->id)
                <form action="{{ route('cart.ad.add', $ad) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <button type="submit"
                        class="btn btn-warning my-btn-call justify-content-center text-dark font-weight-bolder"
                        style="width: 7rem">{{ __('Comprar')}}</button>
                </form>
                @endif

                @if (Auth::user()->id == $ad->user->id || Auth::user()->is_admin)
                @if (!Auth::user()->is_admin)
                <h5>{{ __('Anuncio creado por ti.')}}</h5>
                @else
                <h5 class="mt-4">{{ __('Acciones de administrador')}}</h5>
                @endif
                <a class="btn my-btn-delete justify-content-center mx-auto text-dark font-weight-bolder"
                    href="{{ route('ad.destroy', $ad) }}"><i class="fa-solid fa-trash-can mx-2"></i>{{__('Borrar')}}</a>
                @endif
                @endauth
            </div>
        </div>

    </div>
    {{-- <div class="mt-5 related_ads_show p-1 row justify-content-center">
        <h4 class="col-12 text-center my-4">{{ __('Otros articulos de esta categoría:')}}</h4>
    <div class="mini-card col-12 d-flex">

    </div>
    </div> --}}
</x-layout>
