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
                    <a href="#Novedades"><img src="{{ asset('assets/img/hero-new.jpg') }}" alt="Novedades"
                            class="d-flex w-100 rounded"></a>
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-uppercase">{{ __('Novedades') }}</h3>
                    </div>
                </div>
                <div class="carousel-item item">
                    @foreach ($categories as $category)
                    <a href="{{ route('category.ads', $category) }}">
                        @switch( __($category->name))
                        @case( __('Hombre'))
                        <img src="{{ asset('assets/img/hero-men.jpg') }}" alt="Moda hombre"
                            class="d-flex w-100 rounded">
                        <div class="carousel-caption d-none d-md-block col-md-12 text-right text-dark">
                            <h3 class="text-uppercase">{{ __('Hombre') }}</h3>
                        </div>
                </div>
                @break
                @case( __('Mujer'))
                <div class="carousel-item item">
                    <img src="{{ asset('assets/img/hero-women.jpg') }}" alt="Moda mujer" class="d-flex w-100 rounded">
                    <div class="carousel-caption d-none d-md-block col-md-3 text-left text-dark">
                        <h3 class="text-uppercase">{{ __('Mujer') }}</h3>
                    </div>
                </div>
                @break
                @default
                @endswitch
                </a>
                @endforeach
            </div>

            <!-- Left and right controls/icons -->
            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button> --}}
        </div>
    </div>
    <!-- Carousel end -->

    <!-- Finder and categories -->
    <div class="container">
        <div class="row d-flex justify-content-center">
            <h3 class="mt-5 text-center">{{ __('Compra y vende tu ropa de segunda mano') }}</h3>
            <div class="justify-content-center my-3">
                {{-- <form class="d-flex input-group" role="search">
                    <input type="text" class="form-control" placeholder="{{ __('Buscar...') }}" aria-label="Search">
                <button class="btn btn-outline-warning my-btn" type="submit" id="button-addon2">
                    {{ __('Buscar') }}
                </button>
                </form> --}}
                <form action="{{ route('search') }}" method="GET" class="d-flex input-group" role="search">
                    <input type="search" class="form-control" placeholder="{{ __('Buscar...') }}" aria-label="Search"
                        name="q">
                    <button class="btn btn-outline-warning my-btn" type="submit" id="button-addon2">
                        <i class="bi bi-search px-3"></i>
                    </button>
                </form>
            </div>

    <div class="container">
        <ul class="categories">
            @foreach ($categories as $category)
            <li class="nav-link">
                <a class="nav-link text-center text-dark" href="{{ route('category.ads', $category) }}">
                    @switch( __($category->name))
                    @case( __('Hombre'))
                    <div class="category">
                        <img src="{{asset('assets/img/enfermero.png')}}" alt="Hombre">
                    </div>
                    @break
                    @case( __('Mujer'))
                    <div class="category">
                        <img src="{{asset('assets/img/mujer.png')}}" alt="Mujer">
                    </div>
                    @break
                    @case( __('Niños'))
                    <div class="category">
                        <img src="{{asset('assets/img/nino.png')}}" alt="Niños">
                    </div>
                    @break
                    @case( __('Accesorios'))
                    <div class="category">
                        <img src="{{asset('assets/img/joyas.png')}}" alt="Accesorios">
                    </div>
                    @break
                    @case( __('Calzado'))
                    <div class="category">
                        <img src="{{asset('assets/img/zapato-inteligente.png')}}" alt="Calzado">
                    </div>
                    @break
                    @default
                    @endswitch
                    <p class="p-category-name m-0">{{ __($category->name)}}</p>
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    <!-- Finder and categories end -->

    <!-- Card container -->
    <div class="container" id="Novedades"></div>
    <div class="container mt-5">
        <h3 class="text-center">{{ __('Últimos anuncios') }}</h3>
        <div class="row">
            @forelse($ads as $ad)
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
            </div>
            @empty
            <div class="col-12 mt-5 text-center">
                <h2>{{__('Uy...parece que no hay nada de esta categoría')}}</h2>
                <a href="{{ route('ads.create') }}"
                    class="btn btn-warning btn-block my-btn-call p-2 ml-2">{{__('Vende tu primer objeto')}}</a>
                {{__('o')}}
                <a href="{{route('home')}}" class="btn btn-outline-warning my-btn">{{__('Vuelve a la home')}}</a>
            </div>
            @endforelse
        </div>
    </div>
    <!-- Card container end -->

</x-layout>
