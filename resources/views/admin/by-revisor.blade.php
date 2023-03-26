<x-layout>
    <x-slot name="title">BestChoice - {{ __('Anuncios aceptados en revision')}}</x-slot>

    <div class="container my-3">
        <div class="card w-100 col-l-9 col-md-8">
            <div class="card-header" style="background-color: #F5DEC6">
                <h3>{{ __('Anuncios revisados por:')}} {{ __($user->name) }} #{{ __($user->id) }}</h3>
            </div>
            <div class="row">
                @forelse ($ads as $ad)
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
                <div class="col-12">
                    <h2 class="mb-4">{{ __('No hay artículos revisados')}}</h2>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>
