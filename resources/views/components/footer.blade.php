<div class="container">
    <footer class="py-5">
        <div class="row">
            <div class="col-5 col-md-4 mb-3">
                <h5>Best Choice</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{route('home')}}" class="nav-link p-0 text-muted">Inicio</a></li>
                    <li class="nav-item mb-2"><a href="{{route('about')}}" class="nav-link p-0 text-muted">Quiénes somos</a></li>
                    <li class="nav-item mb-2"><a href="{{route('privacy')}}" class="nav-link p-0 text-muted">Política de Privacidad</a></li>
                    <li class="nav-item mb-2"><a href="{{route('conditions')}}" class="nav-link p-0 text-muted">Términos y condiciones</a></li>
                </ul>
            </div>

            {{-- <div class="col-6 col-md-2 mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                </ul>
            </div> --}}

            <div class="col-5 col-md-4 mb-3">
                <h5>Categorías</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Ropa de hombre</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Ropa de mujer</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Ropa de niño</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Unisex</a></li>
                </ul>
            </div>

            <div class="col-2 col-md-4  mb-3 text-end">
                <form>
                    <h5>Suscríbete a nuestra newsletter</h5>
                    <p>Resumen mensual de las mejores novedades y promociones.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email">
                        <button class="btn btn-primary" type="button">Suscribirme</button>
                    </div>
                </form>
                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4">
                    <p><?php echo date('Y'); ?> BestChoice. Todos los derechos reservados.</p>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3">
                            <a href="https://www.facebook.com/" target="_blank" class="link-dark"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li class="ms-3">
                            <a href="https://twitter.com/" target="_blank" class="link-dark"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li class="ms-3">
                            <a href="https://instagram.com/" target="_blank" class="link-dark"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
