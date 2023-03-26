<x-layout>
    <x-slot name='title'>BestChoice - {{ __('Anuncios por usuario')}}</x-slot>

    <div class="container mt-3">
        <div class="title-ads text-center">
            <h3>{{ __('Tus anuncios favoritos:')}}</h3>
        </div>
        <div class="row">
            @forelse ($ads_user as $ad)
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
            <div class="col-12 text-center">
                <h2 class="mb-4">{{ __('No tienes ningún producto añadido a la lista de favoritos')}}</h2>
            </div>
            @endforelse
        </div>
    </div>
</x-layout>
