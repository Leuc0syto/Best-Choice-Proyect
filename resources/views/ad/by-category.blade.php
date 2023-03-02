<x-layout>
    <x-slot name='title'>BestChoice - {{$category->name}} ads</x-slot>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Anuncios por categoría: {{$category->name}}</h1> {{-- despues borrar si da error --}}
                </div>
            </div>
            <div class="row">
                @forelse($ads as $ad)
                <div class="col-md-3 col-sm-6">
                    <div class="product-grid">
                        <div class="product-image">
                            <a href="{{ route("ads.show", $ad) }}" class="image">
                                <img class="pic-1" src="https://via.placeholder.com/150">
                            </a>
                            <div class="price">{{$ad->price}}€</div>
                            <a href="{{ route("ads.show", $ad) }}" class="add-to-cart">Ver</a>
                        </div>
    
                        <div class="product-content">
                            <div class="card-body">
                                <h3 class="card-title">{{$ad->title}}</h3>
                                <p class="card-text">{{$ad->body}}</p>
                                <strong>
                                    <p><a href="{{ route('category.ads', $category) }}">{{$category->name}}</a></p>
                                </strong>
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
                    <h2>Uyy... parece que no hay nada de esta categoría</h2>
                    <a href="{{ route('ads.create') }}" class="btn btn-success">Vende tu primer objeto</a> o
                    <a href="{{route('home')}}" class="btn btn-primary" >Vuelve a la home</a>
                </div>
                @endforelse

                {{ $ads->links() }}
            </div>
        </div>

</x-layout>