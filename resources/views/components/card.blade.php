<div class="m-auto position-relative p-2 cards_home_anuncios" style="width: 18rem;">
    <div class="fondo_icon icono_fav_card">
        <a href="#"><img src="/img/icons/fav_icon_grey.svg" alt="" class="icon_like"></a>
    </div>
    <span class="m-2 category_name text-white"><a href="{{$categoryLink ?? ''}}"
            class="a_category_name">{{$categoryName ?? ''}}</a></span>
    <a class="a_cards" href="{{$show ?? ''}}">
        <div class="position-relative container__img--card ">
            <img src="{{$image ?? ''}}" class="card-img-top img__card" alt="...">
        </div>
        <div class="card-body my-4 px-1 ">
            <h5 class="card-title">{{$title ?? 'blog'}}</h5>
            <h6 class="card-subtitle mb-2 text-muted mt-2">{{$price ?? ''}}</h6>
            <p class="card-text">{{$body ?? ''}}</p>
        </div>
    </a>
</div>
