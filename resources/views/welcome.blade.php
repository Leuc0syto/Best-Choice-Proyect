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
                    <a href=""><img src="{{ asset('assets/img/hero-new.jpg') }}" alt="Novedades"
                            class="d-flex w-100 rounded" style=""></a>
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="text-uppercase">{{ __('Novedades') }}</h3>
                    </div>
                </div>
                <div class="carousel-item item">
                    <a href=""><img src="{{ asset('assets/img/hero-men.jpg') }}" alt="Moda hombre"
                            class="d-flex w-100 rounded"></a>
                    <div class="carousel-caption d-none d-md-block col-md-12 text-right text-dark">
                        <h3 class="text-uppercase">{{ __('Ropa hombre') }}</h3>
                    </div>
                </div>
                <div class="carousel-item item">
                    <a href=""><img src="{{ asset('assets/img/hero-women.jpg') }}" alt="Moda mujer"
                            class="d-flex w-100 rounded"></a>
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
            <h3 class="mt-5 text-center">{{ __('Compra y vende tu ropa de segunda mano') }}</h3>
            <div class="justify-content-center my-3">
                {{-- <form class="d-flex input-group" role="search">
                    <input type="text" class="form-control" placeholder="{{ __('Buscar...') }}" aria-label="Search">
                    <button class="btn btn-outline-warning my-btn" type="submit" id="button-addon2">
                        {{ __('Buscar') }}
                    </button>
                </form> --}}
                <form action="{{ route('search') }}" method="GET" class="d-flex input-group" role="search">
                    <input type="search" class="form-control" placeholder="{{ __('Buscar...') }}" aria-label="Search" name="q">
                    <button class="btn btn-outline-warning my-btn" type="submit" id="button-addon2">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>

            {{-- @foreach ($categories as $category)
            <div class="col py-4">
                <div class="d-flex flex-column">
                    <div class="text-center mg-text">
                        <button class="btn btn-outline-warning my-btn">
                            <span class="fs-6 my-2">
                                <a class="text-decoration-none text-white font-weight-bolder"
                                    href="{{ route('category.ads', $category) }}">{{ __($category->name) }}</a>
                            </span>
                        </button>

                    </div>
                </div>
            </div>
            @endforeach --}}

 <div class="categories">
    <div class="category">
        <a href=""><img src="{{asset('assets/img/enfermero.png')}}" alt="Hombre"></a>
        <p>{{__('Hombre')}}</p>
    </div>
    <div class="category">
        <a href=""><img src="{{asset('assets/img/mujer.png')}}" alt="Mujer"></a>
        <p>{{__('Mujer')}}</p>
    </div>
    <div class="category">
        <a href=""><img src="{{asset('assets/img/nino.png')}}" alt="Niños"></a>
        <p>{{__('Niños')}}</p>
    </div>
    <div class="category">
        <a href=""><img src="{{asset('assets/img/joyas.png')}}" alt="Accesorios"></a>
        <p>{{__('Accesorios')}}</p>
    </div>
    <div class="category">
        <a href=""><img src="{{asset('assets/img/zapato-inteligente.png')}}" alt="Calzado"></a>
        <p>{{__('Calzado')}}</p>
    </div>
</div>

        </div>

    </div>
    <!-- Finder and categories end -->

    <!-- Card container -->
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

                    {{-- <x-card>
                        @if ($ad->images()->count() > 0)
                        <x-slot name='image'>{{$ad->images()->first()->getUrl(500,500)}}</x-slot>
                        @else
                        <x-slot name='image'>{{'https://picsum.photos/700/600?a'}}</x-slot>
                        @endif
                        <x-slot name='show'>{{route('ads.show', $ad)}}</x-slot>
                        <x-slot name='category'>{{__($ad->category->name)}}</x-slot>
                        <x-slot name='categoryLink'>{{route('category.ads',$ad->category)}}</x-slot>
                        <x-slot name='categoryName'>{{__($ad->category->name)}}</x-slot>
                        <x-slot name='title'>{{$ad->title}}</x-slot>
                        <x-slot name='price'>{{$ad->price}}€</x-slot>
                    </x-card> --}}

                </div>
            </div>
            @empty
            <div class="col-12 mt-5 text-center">
                <h2>{{__('Uy...parece que no hay nada de esta categoría')}}</h2>
                <a href="{{ route('ads.create') }}" class="btn btn-warning btn-block my-btn-call p-2 ml-2">{{__('Vende tu primer objeto')}}</a>
                {{__('o')}}
                <a href="{{route('home')}}" class="btn btn-outline-warning my-btn">{{__('Vuelve a la home')}}</a>
            </div>
            @endforelse
        </div>
    </div>
    <!-- Card container end -->

</x-layout>
