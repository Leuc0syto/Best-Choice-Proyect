<x-layout>
    <x-slot name='title'>BestChoice - ads</x-slot>
    {{-- <div class="px-4 py-5 my-5 text-center my-hero">
        <h1 class="display-5 fw-bold">{{__('Novedades')}}</h1>
        <p class="lead mb-2 my-subtitle">{{__('Viste tu actitud.')}}</p>
    </div> --}}
    <div id="adImages" class="carousel slide col-12 my-hero" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#adImages" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#adImages" data-bs-slide-to="1" class="active" aria-current="true"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#adImages" data-bs-slide-to="2" class="active" aria-current="true"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://picsum.photos/700/600?a" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://picsum.photos/700/600?b" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://picsum.photos/700/600?c" class="d-block w-100" alt="...">
            </div>
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
    <div class="container">
        <div class="row">
            @forelse($ads as $ad)
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="{{ route('ads.show', $ad) }}" class="image">
                                <img class="pic-1" src="https://i.ebayimg.com/images/g/WuAAAOSw1iFhqrJZ/s-l1600.jpg">
                            </a>
                            <div class="price">{{ $ad->price }}€</div>
                            <a href="{{ route('ads.show', $ad) }}" class="add-to-cart">{{__('Ver')}}</a>
                        </div>

                        <div class="product-content">
                            <div class="card-body">
                                <h3 class="card-title">{{ $ad->title }}</h3>
                                <p class="card-text">{{ $ad->body }}</p>
                                <div class="card-subtitle mb-2">
                                    <small>{{__('Vendedor:')}} {{ $ad->user->name }}</small>
                                    <ul class="rating">
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star"></li>
                                        <li class="fa fa-star-o"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-12">
                    <h2>{{__('Uyy...parece que no hay nada de esta categoría')}}</h2>
                    <a href="{{ route('ads.create') }}" class="btn btn-success">{{__('Vende tu primer objeto')}}</a>
                    <a href="{{ route('home') }}" class="btn btn-primary">{{__('Vuelve a la home')}}</a>
                </div>
            @endforelse
        </div>

    </div>

</x-layout>
