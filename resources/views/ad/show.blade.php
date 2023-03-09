<x-layout>
    <div class="card w-75 mx-auto my-5">
        <div class="card-header">
            <div class="row">
                <div>{{ $ad->user->name }}</div>
            </div>

        </div>
        <div id="adImages" class="carousel slide" data-bs-ride="true">
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
        
        <div class="card-body">
            <h2 class="card-title">{{ $ad->price }}€</h2>
            <h5 class="card-title">{{ $ad->title }}</h5>
            <a class="btn btn-outline-success btn-sm my-2"
                href="{{route('category.ads',$ad->category)}}">{{$ad->category->name}}</a>
            <p class="card-text">{{ $ad->body }}</p>
            <p class="card-text"><small class="text-muted">{{ $ad->created_at->format('d/m/Y') }}</small></p>
            <a href="#" class="btn btn-success">Comprar</a>
        </div>


    </div>

</x-layout>
