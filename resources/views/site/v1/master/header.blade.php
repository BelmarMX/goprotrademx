<!-- ====== start loading page ====== -->
<div id="preloader"></div>
<!-- ====== end loading page ====== -->

<!-- ====== start top navbar ====== -->
<div class="top-navbar style-4">
    <div class="container">
        <div class="content text-white">
            <img src="{{ asset('v2/img/icons/nav_icon/imoj_heart.png') }}" alt="" class="icon-15">
            <span class="fs-10px op-6">Podemos ayudarte</span>
            <a href="page-contact-5.html" class="fs-10px text-decoration-underline ms-2">Escríbenos</a>
        </div>
    </div>
</div>
<!-- ====== end top navbar ====== -->

<!-- ====== start navbar ====== -->
<nav class="navbar navbar-expand-lg navbar-light style-4" id="main-nav">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img width="150"
                 height="57"
                 src="{{ asset('v1/images/layout/logo-moca-png.png') }}"
                 alt="Soluciones MOCA ID"
            />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0 text-uppercase">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#mision" @if( Request::is('/') ) data-scroll-nav="1" @endif>
                        Misión
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#vision" @if( Request::is('/') ) data-scroll-nav="2" @endif>
                        Visión
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#servicios" @if( Request::is('/') ) data-scroll-nav="3" @endif>
                        Servicios
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#blog" @if( Request::is('/') ) data-scroll-nav="4" @endif>
                        Últimas noticias
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if( Request::is('blog') || Request::is('blog/*') ) active @endif" href="{{ route('blog') }}">
                        Blog
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if( Request::is('escribenos') ) active @endif" href="{{ route('escribenos') }}">
                        Escríbenos
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- ====== end navbar ====== -->

<!-- ====== start header ====== -->
<header class="style-4" data-scroll-index="0">
    <div class="content">
        <div class="container">
            <div class="row gx-0">
                <div class="col-lg-6">
                    <div class="info">
                        <small class="mb-50 title_small">MOCA Soluciones</small>
                        <h1 class="mb-30"><span>Negocios Inteligentes</span> en un solo lugar</h1>
                        <p class="text">Te ayudamos a tomar mejores decisiones basadas en datos medibles.<br> Abarcamos integralmente todos los procesos del desarrollo de software.</p>
                        <div class="d-flex align-items-center mt-50">
                            <a href="{{ route('escribenos') }}" class="btn rounded-pill bg-blue4 fw-bold text-white me-4" target="_blank">
                                <small><i class="fas fa-code me-2 pe-2 border-end"></i> Desarrollo de software</small>
                            </a>
                            <a href="{{ route('escribenos') }}" class="btn rounded-pill bg-blue4 fw-bold text-white me-4" target="_blank">
                                <small><i class="fas fa-project-diagram me-2 pe-2 border-end"></i> Inteligencia de Negocios</small>
                            </a>
                        </div>
                        {{--
                        <span class="mt-100 me-5">
                            <small
                                class="icon-30 bg-gray rounded-circle color-blue4 d-inline-flex align-items-center justify-content-center me-1">
                                <i class="fas fa-sync"></i>
                            </small>
                            <small class="text-uppercase">Free 14 Days Trial</small>
                        </span>
                        <span class="mt-100">
                            <small
                                class="icon-30 bg-gray rounded-circle color-blue4 d-inline-flex align-items-center justify-content-center me-1">
                                <i class="fas fa-credit-card"></i>
                            </small>
                            <small class="text-uppercase">One time payment</small>
                        </span>
                        --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="img">
                        {{-- <img src="{{ asset('v2/img/header/header_4.png') }}" alt=""> --}}
                        <img src="{{ asset('v2/img/v2t/bussines_monitor.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('v2/img/header/header_4_bubble.png') }}" alt="" class="bubble">
    </div>
    <img src="{{ asset('v2/img/header/header_4_wave.png') }}" alt="" class="wave">
</header>
<!-- ====== end header ====== -->
