<x-layout>
    <x-slot name='title'>BestChoice - ads</x-slot>
<div class="container-fluid my-hero">
    <div class="col-12 mx-5 px-5">
        <div class="col-md-5 p-lg-5 mx-auto mb-5 d-flex flex-column align-items-end">
            <a class="btn btn-create px-2 my-5" href="{{route('ads.create')}}">Crear anuncio</a>
            <div class="container-fluid">
                <h1 class="display-4 fw-normal px-4 my-3 d-flex my-title">¡Best Choice!</h1>
            </div>
            <p class="lead fw-normal my-subtitle">Vende lo que no utilizas en Best Choice</p>

        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>
</div>
    <div class="container">
        <div class="row">
            @forelse($ads as $ad)
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="{{ route("ads.show", $ad) }}" class="image">
                            <img class="pic-1" src="https://i.ebayimg.com/images/g/WuAAAOSw1iFhqrJZ/s-l1600.jpg">
                        </a>
                        <div class="price">{{$ad->price}}€</div>
                        <a href="{{ route("ads.show", $ad) }}" class="add-to-cart">Ver</a>
                    </div>

                    <div class="product-content">
                        <div class="card-body">
                            <h3 class="card-title">{{$ad->title}}</h3>
                            <p class="card-text">{{$ad->body}}</p>
                            <div class="card-subtitle mb-2">
                                <small>Vendedor: {{$ad->user->name}}</small>
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
                <h2>Uyy...parece que no hay nada de esta categoría</h2>
                <a href="{{route('ads.create')}}" class="btn btn-success">Vende tu primer objeto</a>
                <a href="{{route('home')}}" class="btn btn-primary">Vuelve a la home</a>
            </div>
            @endforelse
        </div>

    </div>

</x-layout>
