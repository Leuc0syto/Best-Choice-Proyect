<x-layout>
    <x-slot name='title'>BestChoice - {{$category->name}} ads</x-slot>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>{{__('Anuncios por categoría:')}} {{__($category->name)}}</h1>
                </div>
            </div>
            <div class="row">
                @forelse($ads as $ad)
                <div class="col-md-3 col-sm-6 col-6">
                    <div class="product-grid">
                        <div class="product-image">
                            {{-- @if ($ad->images()->count() > 0)
                            <img src="{{ Storage::url($ad->images()->first()->path) }}" class="card-img-top" alt="...">
                        @else
                            <img src="https://i.ebayimg.com/images/g/WuAAAOSw1iFhqrJZ/s-l1600.jpg" alt="...">
                        @endif --}}

                        {{-- Refactoring del codigo anterior --}}
                        
                        <img src="{{ !$ad->images()->get()->isEmpty() ? $ad->images()->first()->getUrl(400, 400) : 'https://i.ebayimg.com/images/g/WuAAAOSw1iFhqrJZ/s-l1600.jpg' }}" class="card-img-top" alt="">
                        
                            <div class="price">{{$ad->price}}{{__('€')}}</div>
                            <a href="{{ route("ads.show", $ad) }}" class="add-to-cart">{{__('Ver')}}</a>
                        </div>

                        <div class="product-content">
                            <div class="card-body">
                                <h3 class="card-title">{{$ad->title}}</h3>
                                <p class="card-text">{{__($ad->body)}}</p>
                                <strong>
                                    <p><a href="{{ route('category.ads', $category) }}">{{__($category->name)}}</a></p>
                                </strong>
                                <div class="card-subtitle mb-2">
                                    <small>{{__('Vendedor:')}} {{$ad->user->name}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 mt-5 text-center">
                    <h2>{{__('Uyy...parece que no hay nada de esta categoría')}}</h2>
                    <a href="{{ route('ads.create') }}" class="btn btn-success">{{__('Vende tu primer objeto')}}</a> {{__('o')}}
                    <a href="{{route('home')}}" class="btn btn-primary" >{{__('Vuelve a la home')}}</a>
                </div>
                @endforelse
                {{ $ads->links() }}
            </div>
        </div>

</x-layout>
