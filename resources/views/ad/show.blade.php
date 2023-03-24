<x-layout>
    <div class="container my-3">
        <div class="card mx-auto col-l-9 col-md-7">
            <div class="card-header" style="background-color: #F5DEC6">
                <div class="d-flex">
                    <img src="{{ asset('assets/img/default-profile-icon.jpg') }}" class="rounded-circle"
                        style="width: 50px;" alt="Avatar">
                    <div class="my-auto mx-3">{{ $ad->user->name }}</div>

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
                <button type="button"
                    class="btn btn-warning my-btn-call justify-content-center text-dark font-weight-bolder">{{__('Comprar')}}
                </button>
            </div>
        </div>


        <div class="mt-5 related_ads_show p-1 row justify-content-center">
            <h4 class="col-12 text-center my-4">{{ __('Otros articulos de esta categoría:')}}</h4>
            <div class="mini-card col-12 d-flex">
                {{-- @forelse($ads as $ad)
                @endforelse --}}
                
                {{-- @forelse($ads as $ad)
                <div class="col-md-3 col-sm-6 col-6 my-2">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="{{ route('ads.show', $ad) }}" class="add-to-cart">
                                <img src="{{ !$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(400,400) : 'https://via.placeholder.com/150'}}"
                                    class="card-img-top my-card" alt="...">
                                <div class="price">{{ $ad->price }}{{ __('€') }}</div>
                            </a>
                        </div>
                        <div class="product-content">
                            <p class="card-title">{{ $ad->title }}</p>
                        </div>

                    </div>
                </div> --}}
                {{-- @forelse ($ads as $ad)
                    <div class="col-3 container d-flex justify-content-center content-mini-card">
                        <x-minicard
                            img="{{ !$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(400,300) : 'https://via.placeholder.com/150'}}"
                title="{{ $ad->title }}"
                price="{{ $ad->price }}"
                body=""
                :ad="$ad">
                </x-minicard>
            </div>
            @empty
            <h5>{{ __('Parece que no hay más productos en esta categoría...')}}</h5>
            @endforelse --}}
            {{-- @empty
            <div class="col-12 mt-5 text-center">
                <h2>{{__('Parece que no hay más productos en esta categoría...')}}</h2>
                <a href="{{route('home')}}" class="btn btn-outline-warning my-btn">{{__('Vuelve a la home')}}</a>
            </div>
            @endforelse --}}
        </div>

    </div>

</x-layout>
