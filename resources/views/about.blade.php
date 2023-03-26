<x-layout>
    {{--     <div class="container text-center mt-5">
        <div class="row d-flex align-content-center">
            <div class="col-12 col-md-6">
                <h1>¿Quiénes somos...?</h1>
                <h2>Si tu primera opción es de segunda mano, este es tu lugar</h2>
                <p> Cuando haces algo tan sencillo como comprar y vender en Best Choice, en realidad estás haciendo
                    muchas más cosas. Cosas como darle una nueva vida a esa raqueta de pádel que no utilizas y sacarte
                    un dinerillo extra. Cosas como ahorrarte un buen pellizco al comprar aquello que quieres y que no
                    imaginabas que encontrarías. También estás haciendo cosas increíbles como contribuir a que el
                    planeta sea un poquito más sostenible gracias a un consumo más responsable. Y muchas, muchas cosas
                    más.

                    Porque cuando utilizas Best Choice, pasas a formar parte de una comunidad de millones de personas
                    que han descubierto una mejor forma de comprar, de compartir y de vivir.

                    Así que dinos, ¿cuál es tu primera opción?
                </p>
            </div>

            <div class="col-none col-md-6">
                <img class="img-fluid img_about" src="/images/venta-personas.jpg" alt="">
            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-5">
            <h4>Best Choice y la segunda mano</h4>
            <p> “Si no lo usas, súbelo”. Bajo esta premisa, Best Choice se ha convertido en una comunidad en la que cada
                día millones de personas compran y venden productos de segunda mano. Y no hemos hecho más que empezar.
                Comprar segunda mano es la mejor forma de conseguir lo que necesitas a un precio mejor. ¡Pero va mucho
                más allá! Cada vez que compras algo en Best Choice, fomentas un consumo más responsable, porque alargas
                la vida de los productos y evitas su sobreproducción. Vender segunda mano es decirle al mundo que
                podemos vivir más con menos. Más espacio en casa, más dinero extra, más nuevas experiencias, más
                recuerdos inolvidables, más lo que quieras, y menos cosas sin usar guardadas en el armario. Por fin, la
                sociedad ha comprendido que la segunda mano es una nueva forma de consumir llena de beneficios. Esta es
                la razón por la que cada vez más personas usan Best Choice, la plataforma líder de las páginas de
                segunda mano y de anuncios clasificados.
            </p>
        </div>
    </div>
    </div> --}}
    <div class="container">
        <div class="col-12">
            <h1 class="text-center title-about mb-2 mt-5"> {{ __('El equipo de desarrolladores de BestChoice')}}</h1>
        </div>
            
        <div class="row m-5 d-flex justify-content-around">
            {{-- Leudys --}}
            <div class="card col-md-3 col-l-4 about__card my-2 mx-2">
                <img class="card-img-top rounded-circle about__card_img mx-auto mt-3"
                    src="{{asset('assets/img/photo-leudys.JPG')}}" alt="Leudys">
                <div class="card-body text-center">
                    <h2 class="about__name fs-5">Leudys Torres</h2>
                    <hr>
                    <p class="about__description">Estudiante del bootcamp en desarrollo web: <br><a
                            href="https://aulab.es/" target="_blank" class="text-decoration-none">
                            <img src="{{asset('assets/img/logo-aulab-hackademy-horizontal.png')}}" class="w-75 mt-3"
                                alt="logo aulab">
                        </a>
                    </p> <a href="https://www.linkedin.com/in/leudys-torres" target="_blank" class="about__button"><i
                            class="fa-brands fa-linkedin"></i></a>
                    <a href="https://github.com/Leuc0syto" target="_blank" class="about__button"><i
                            class="fa-brands fa-github"></i></i></a>
                    <a href="mailto:leudystorres30@gmail.com" class="about__button"><i class="fa-solid fa-envelope"></i></a>
                </div>
            </div>

            {{-- Daniel --}}
            <div class="card col-md-3 col-l-4 about__card my-2 mx-2">
                <img class="card-img-top rounded-circle about__card_img mx-auto mt-3"
                    src="{{asset('assets/img/photo-dani.jpeg')}}" alt="Daniel">
                <div class="card-body text-center">
                    <h2 class="about__name fs-5">Daniel Rubio</h2>
                    <hr>
                    <p class="about__description">Estudiante del bootcamp en desarrollo web: <br><a
                            href="https://aulab.es/" target="_blank" class="text-decoration-none">
                            <img src="{{asset('assets/img/logo-aulab-hackademy-horizontal.png')}}" class="w-75 mt-3"
                                alt="logo aulab">
                        </a>
                    </p>
                    <div class="">
                        <a href="https://www.linkedin.com/in/daniel-rubio-garcia/" target="_blank"
                            class="about__button"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="https://github.com/DanielRubi0" target="_blank" class="about__button"><i
                                class="fa-brands fa-github"></i></i></a>
                        <a href="mailto:drubiogarcia@gmail.com" class="about__button"><i
                                class="fa-solid fa-envelope"></i></a>
                    </div>
                </div>
            </div>

            {{-- Miquel --}}
            <div class="card col-md-3 col-l-4 about__card my-2 mx-2">
                <img class="card-img-top rounded-circle about__card_img mx-auto mt-3"
                    src="{{asset('assets/img/photo-miquel.jpg')}}" alt="Miquel">
                <div class="card-body text-center">
                    <h2 class="about__name fs-5">Miquel Prokhorov</h2>
                    <hr>
                    <p class="about__description">Estudiante del bootcamp en desarrollo web: <br><a
                            href="https://aulab.es/" target="_blank" class="text-decoration-none">
                            <img src="{{asset('assets/img/logo-aulab-hackademy-horizontal.png')}}" class="w-75 mt-3"
                                alt="logo aulab">
                        </a>
                    </p>
                    <div class="">
                        <a href="#" target="_blank" class="about__button"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="https://github.com/Mickyfsd" target="_blank" class="about__button"><i
                                class="fa-brands fa-github"></i></i></a>
                        <a href="mailto:micpro79@gmail.com" class="about__button"><i class="fa-solid fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
