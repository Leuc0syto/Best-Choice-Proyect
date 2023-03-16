<x-layout>
    <x-slot name='title'>BestChoice - ads</x-slot>

    <!-- Carousel -->
    <div class="container">
        <div id="carousel" class="carousel slide" data-bs-ride="carousel">

            <!-- Indicators/dots -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carousel" data-bs-slide-to="2"></button>
            </div>

            <!-- The slideshow/carousel -->
            <div class="carousel-inner">
                <div class="carousel-item item active">
                    <img src="{{ asset('assets/img/hero-new.jpg') }}" alt="Novedades" class="d-flex w-100 rounded">
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-uppercase">{{ __('Novedades') }}</h3>
                    </div>
                </div>
                <div class="carousel-item item">
                    <img src="{{ asset('assets/img/hero-men.jpg') }}" alt="Moda hombre" class="d-flex w-100 rounded">
                    <div class="carousel-caption d-none d-md-block col-md-12 text-right text-dark">
                        <h3 class="text-uppercase">{{ __('Ropa hombre') }}</h3>
                    </div>
                </div>
                <div class="carousel-item item">
                    <img src="{{ asset('assets/img/hero-women.jpg') }}" alt="Moda mujer" class="d-flex w-100 rounded">
                    <div class="carousel-caption d-none d-md-block col-md-3 text-left text-dark">
                        <h3 class="text-uppercase">{{ __('Ropa mujer') }}</h3>
                    </div>
                </div>
            </div>

            <!-- Left and right controls/icons -->
            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev"> --}}
            {{-- <span class="carousel-control-prev-icon"></span> --}}
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                {{-- <span class="carousel-control-next-icon"></span> --}}
            </button>
        </div>
    </div>
    <!-- Carousel end -->

    <!-- Finder and categories -->
    <div class="container">
        <div class="row d-flex justify-content-center">
            <h3 class="mt-5 text-center">Compra y vende tu ropa de segunda mano</h3>
            <div class="d-flex justify-content-center my-3 px-5">
                <form class="d-flex" role="search">
                    <div class="box-src">
                        <input type="search" class="form-control-dark text-bg-light me-2"
                            placeholder="{{ __('Buscar...') }}" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit">
                            {{ __('Buscar') }}
                        </button>
                    </div>
                </form>

            </div>

        </div>
        <div class="row mt-4 g-1 px-4 mb-5">
            <h3 class="text-center">Nuestras categorías</h3>
            @foreach ($categories as $category)
            <div class="col-md-2">
                <div class="card-inner p-3 d-flex flex-column align-items-center">
                    <img src="#" width="50">
                    <div class="text-center mg-text">
                        <span class="mg-text"><a class="text-decoration-none text-black font-weight-bolder"
                                href="{{ route('category.ads', $category) }}">{{ __($category->name) }}</a></span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Finder and categories end -->

    <!-- Card container -->
    <div class="container">
        <div class="row">
            @forelse($ads as $ad)
            <div class="col-md-3 col-sm-6 col-6">
                <div class="product-grid">
                    <div class="product-image">
                        @if ($ad->images()->count() > 0)
                        <img src="{{ Storage::url($ad->images()->first()->path) }}" class="card-img-top" alt="...">
                        @else
                        <img src="{{ asset('assets/img/no-pic.jpg') }}" alt="...">
                        @endif
                        {{-- <a href="{{ route('ads.show', $ad) }}" class="image">
                        <img class="pic-1" src="https://i.ebayimg.com/images/g/WuAAAOSw1iFhqrJZ/s-l1600.jpg">
                        </a> --}}
                        <div class="price">{{ $ad->price }}{{ __('€') }}</div>
                        <a href="{{ route('ads.show', $ad) }}" class="add-to-cart">{{ __('Ver') }}</a>
                    </div>
                    <div class="product-content">
                        <div class="card-body">
                            <h3 class="card-title">{{ $ad->title }}</h3>
                            <p class="card-text">{{ $ad->body }}</p>
                            <div class="card-subtitle mb-2">
                                <small>{{ __('Vendedor:') }} {{ $ad->user->name }}</small>
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
                <h2>{{ __('Uyy...parece que no hay nada de esta categoría') }}</h2>
                <a href="{{ route('ads.create') }}" class="btn btn-success">{{ __('Vende tu primer objeto') }}</a>
                <a href="{{ route('home') }}" class="btn btn-primary">{{ __('Vuelve a la home') }}</a>
            </div>

            @endforelse
        </div>
    </div>
    <!-- Card container end -->



</x-layout>
