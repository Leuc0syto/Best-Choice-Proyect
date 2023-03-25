<x-layout>
    <x-slot name='title'>BestChoice - {{$category->name}} ads</x-slot>
    <div class="container mt-3">
        <h3>{{__('Anuncios por categoría:')}} {{__($category->name)}}</h3>
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
                <a href="{{ route('ads.create') }}" class="btn btn-warning btn-block my-btn-call p-2 ml-2">{{__('Vender Anuncio')}}</a>
                {{__('o')}}
                <a href="{{route('home')}}" class="btn btn-outline-warning my-btn">{{__('Vuelve a la home')}}</a>
            </div>
            @endforelse
            {{ $ads->links() }}
        </div>
    </div>

</x-layout>
