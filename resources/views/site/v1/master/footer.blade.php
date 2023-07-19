<!-- ====== start footer ====== -->
<footer class="style-4" data-scroll-index="8">
    <div class="container">
        <div class="section-head text-center style-4">
            <h2 class="mb-10">Listos para <span>Codificar</span> </h2>
            <p>Comunícate con nosotros para brindarte una mejor asesoría a partir de las necesidades de tu empresa.</p>
        </div>
        <div class="foot mt-80">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="logo">
                        <img width="150"
                             height="57"
                             src="{{ asset('v1/images/layout/logo-moca-png.png') }}"
                             alt="GoProTradeMX ID"
                        />
                    </div>
                </div>
                <div class="col-lg-8">
                    <ul class="links">
                        <li>
                            <a href="/" class=" active">Home</a>
                        </li>
                        <li>
                            <a @if( Request::is('/') ) data-scroll-nav="1" @endif href="/#mision">Misión</a>
                        </li>
                        <li>
                            <a @if( Request::is('/') ) data-scroll-nav="2" @endif href="/#vision">Visión</a>
                        </li>
                        <li>
                            <a @if( Request::is('/') ) data-scroll-nav="3" @endif href="/#servicios">Servicios</a>
                        </li>
                        <li>
                            <a @if( Request::is('/') ) data-scroll-nav="4" @endif href="/#blog">Últimas noticias</a>
                        </li>
                        <li>
                            <a class="@if( Request::is('blog') || Request::is('blog/*') ) active @endif" href="{{ route('blog') }}">Blog</a>
                        </li>
                        <li>
                            <a class="@if( Request::is('escribenos') ) active @endif" href="{{ route('escribenos') }}">Escríbenos</a>
                        </li>
                        <li>
                            <a class="@if( Request::is('aviso-privacidad') ) active @endif" href="{{ route('aviso-privacidad') }}">Aviso de privacidad</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2">&nbsp;</div>
            </div>
        </div>
        <div class="copywrite text-center">
            <small class="small">
                © 2022 <a href="/" class="fw-bold text-decoration-underline">GoProTradeMX.</a> Derechos Reservados.
            </small>
        </div>
    </div>
    <img src="{{ asset('v1/img/footer/footer_4_wave.png') }}" alt="" class="wave">
</footer>
<!-- ====== end footer ====== -->

<!-- ====== start to top button ====== -->
<a href="#" class="to_top bg-gray rounded-circle icon-40 d-inline-flex align-items-center justify-content-center">
    <i class="bi bi-chevron-up fs-6 text-dark"></i>
</a>
<!-- ====== end to top button ====== -->

<a id="WhatsappButton"
   href="https://api.whatsapp.com/send?phone=523333900219&text=Para%20brindarte%20un%20mejor%20servicio%20por%20favor%20deja%20tus%20datos%20(Nombre,%20Correo%20electr%C3%B3nico,%20%20y%20asunto)"
   target="_blank"
   data-bs-toggle="tooltip"
   title="Envíanos un whats!"
>
    <img width="60"
         height="60"
         src="{{ asset('v1/images/layout/whatsapp_api.png') }}"
         alt="Whatsapp contacto"
    />
</a>
