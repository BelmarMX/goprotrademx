@extends('site.v2.master.app')

{{-- meta tags --}}
@section('title',         'Bienvenidos')
@section('description',   '')
@section('keywords',      '')
@section('image',         '')

{{-- website contents --}}
@push('css')
@endpush

@section('content')
<main>
    <!-- ====== start features ====== -->
    <section class="features pt-70 pb-70 style-4">
        <div class="container">
            <div class="section-head text-center style-4">
                <h2 class="mb-70">Nuestos <span>Servicios</span></h2>
            </div>
            <div class="content">
                <div class="features-card">
                    <div class="icon img-contain">
                        <img src="{{ asset('v2/img/icons/fe1.png') }}" alt="">
                    </div>
                    <h6>Desarrollo<br>de Software</h6>
                </div>
                <div class="features-card">
                    <div class="icon img-contain">
                        <img src="{{ asset('v2/img/icons/fe2.png') }}" alt="">
                    </div>
                    <h6>Big Data e<br>Inteligencia de negocio</h6>
                </div>
                {{--
                <div class="features-card">
                    <div class="icon img-contain">
                        <img src="{{ asset('v2/img/icons/fe3.png') }}" alt="">
                        <span
                            class="label icon-40 alert-success text-success rounded-circle small text-uppercase fw-bold">
                                new
                            </span>
                    </div>
                    <h6>Collaboration and <br> Share</h6>
                </div>
                --}}
                <div class="features-card">
                    <div class="icon img-contain">
                        <img src="{{ asset('v2/img/icons/fe4.png') }}" alt="">
                    </div>
                    <h6>Consultoría en<br>aceleración del negocio</h6>
                </div>
                <div class="features-card">
                    <div class="icon img-contain">
                        <img src="{{ asset('v2/img/icons/fe5.png') }}" alt="">
                    </div>
                    <h6>Diseño<br> gráfico</h6>
                </div>
            </div>
        </div>
        <img src="{{ asset('v2/img/feat_circle.png') }}" alt="" class="img-circle">
    </section>
    <!-- ====== end features ====== -->

    <!-- ====== start about ====== -->
    <section class="about section-padding style-4">
        {{-- MISION --}}
        <div class="content frs-content" id="mision" data-scroll-index="1">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="img mb-30 mb-lg-0">
                            {{-- <img src="{{ asset('v2/img/about/ipad.png') }}" alt=""> --}}
                            <img src="{{ asset('v2/img/v2t/mision.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="info">
                            <div class="section-head style-4">
                                <h2 class="mb-30">Nuestra <span>Misión</span> </h2>
                            </div>
                            <p class="text mb-40">
                                Nuestra misión como empresa es crear valor a largo plazo para nuestros clientes y colaboradores a través de un compromiso apasionado con la excelencia y un proceso de gestión disciplinada, que en conjunto impulsa la ventaja competitiva sostenida en un mercado global y dinámica. Logramos el éxito mediante el desarrollo de la tecnología, la inversión a nivel humano, la mejora continua y la entrega de resultados para los clientes.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{ asset('v2/img/about/about_s4_lines.png') }}" alt="" class="lines">
            <img src="{{ asset('v2/img/about/about_s4_bubble.png') }}" alt="" class="bubble">
        </div>
        {{-- VISION --}}
        <div class="content sec-content" id="vision" data-scroll-index="2">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-5 order-2 order-lg-0">
                        <div class="info">
                            <div class="section-head style-4">
                                <h2 class="mb-30"><span>Visión</span> </h2>
                            </div>
                            <p class="text mb-40">
                                Soluciones MOCA elige ser un líder en el servicio a nuestros clientes, avanzando nuestras tecnologías y premiar a todos los que invierten en nosotros para mantener nuestro liderazgo, sin descanso buscando mejorar nuestro desempeño. Traemos urgencia a todos los desafíos de negocios y oportunidades. Anticipamos cambiar y darle forma a nuestro propósito. Animamos a las nuevas ideas que desafían lo imposible y buscamos involucrar cada mente en el crecimiento de nuestro negocio, por lo cual siempre nos mantenemos con un hambre de servir.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 order-0 order-lg-2">
                        <div class="img mb-30 mb-lg-0">
                            {{-- <img src="{{ asset('v2/img/about/2mobiles.png') }}" alt=""> --}}
                            <img src="{{ asset('v2/img/v2t/vision-2.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{ asset('v2/img/about/about_s4_bubble2.png') }}" alt="" class="bubble2">
        </div>
        {{-- SERVICIOS --}}
        <div class="content trd-content" id="servicios" data-scroll-index="3">
            <div class="container mb-3">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="img mb-30 mb-lg-0">
                            {{--<img src="{{ asset('v2/img/about/about_s4_img3.png') }}" alt="">--}}
                            <img src="{{ asset('v2/img/v2t/software_development.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="info">
                            <div class="section-head style-4">
                                <small class="title_small">Servicios</small>
                                <h2 class="mb-30">Desarrollo de <span>Software</span> </h2>
                            </div>
                            <p class="text mb-40">
                                Tener una aplicación ya sea móvil, web, escritorio o simplemente de inteligencia de negocio, es un gran diferenciador para su empresa. Es una sorpresa que los clientes que pueden acceder a sus productos o servicios con facilidad tienen más probabilidades de convertirse en clientes de la repetición. Al proporcionar contenido valioso en relación con su negocio puede ofrecer un valor duradero a sus clientes y ayudarles a ver su marca como una autoridad de confianza en su campo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mb-3">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 order-2">
                        <div class="img mb-30 mb-lg-0">
                            {{--<img src="{{ asset('v2/img/about/about_s4_img3.png') }}" alt="">--}}
                            <img src="{{ asset('v2/img/v2t/big_data.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 order-1">
                        <div class="info">
                            <div class="section-head style-4">
                                <small class="title_small">Servicios</small>
                                <h2 class="mb-30">Big Data e <span>Inteligencia de negocio</span> </h2>
                            </div>
                            <p class="text mb-40">
                                Los administradores de bases de datos (DBA) suelen ser los héroes anónimos de las organizaciones de TI, y no es fácil encontrar a dichos profesionales con tales habilidades. Y ahí es donde nosotros, Soluciones MOCA, podemos ayudar. Nuestros expertos estarán con usted durante todas las etapas de su proyecto, ya sea que esté iniciando su ciclo de vida o esté a punto de iniciar un cambio mayor de arquitectura, para ayudarlo a tomar decisiones que son cruciales para el futuro de sus aplicaciones.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mb-3">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="img mb-30 mb-lg-0">
                            {{--<img src="{{ asset('v2/img/about/about_s4_img3.png') }}" alt="">--}}
                            <img src="{{ asset('v2/img/v2t/business_growth.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="info">
                            <div class="section-head style-4">
                                <small class="title_small">Servicios</small>
                                <h2 class="mb-30">Consultoría en <span>Aceleración de negocios</span></h2>
                            </div>
                            <p class="text mb-40">
                                No importa el giro o tamaño de tu empresa, nuestros proyectos y clientes nos han dado un gran diferenciador de valor el cual se ve reflejado en cada estrategia, ejecución, implementación o junta acalorada, dando como resultado en una metodología y gestión de proyectos propia, fusionando las mejores prácticas en el mercado, así como la experiencia certificada de cada uno de nuestros talentos humanos.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6 order-2">
                        <div class="img mb-30 mb-lg-0">
                            {{--<img src="{{ asset('v2/img/about/about_s4_img3.png') }}" alt="">--}}
                            <img src="{{ asset('v2/img/v2t/graphic_design.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 order-1">
                        <div class="info">
                            <div class="section-head style-4">
                                <small class="title_small">Servicios</small>
                                <h2 class="mb-30">Diseño <span>gráfico</span> </h2>
                            </div>
                            <p class="text mb-40">
                                Poseemos un buen ojo para el detalle. La capacidad de expresar ideas creativas es crucial. La comprensión de las nuevas modas y tendencias es necesario. Contamos con la disciplina que un diseñador tiene que empezar proyectos, presupuesto y tiempo de cumplir con los plazos necesarios puestos sobre ellos por un empleador.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{ asset('v2/img/about/about_s4_bubble.png') }}" alt="" class="bubble">
        </div>

        <div class="integration pt-60">
            <div class="section-head text-center style-4">
            </div>
            <div class="container">
                <div class="content">
                    <div class="img">
                    </div>
                </div>
            </div>
            <img src="{{ asset('v2/img/about/intg_back.png') }}" alt="" class="intg-back">
        </div>
        <img src="{{ asset('v2/img/about/about_s4_wave.png') }}" alt="" class="top-wave">
        <img src="{{ asset('v2/img/about/about_s4_wave.png') }}" alt="" class="bottom-wave">
    </section>
    <!-- ====== end about ====== -->

    <section class="popular-posts related Posts section-padding pb-100 bg-gray5" data-scroll-index="4">
        <div class="container">
            <h5 class="fw-bold text-uppercase mb-50">Últimas noticias</h5>
            <div class="related-postes-slider position-relative">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($lastest AS $entry)
                            <div class="swiper-slide">
                                <div class="card border-0 bg-transparent rounded-0 p-0  d-block">
                                    <a href="{{ route('blog-article', [$entry -> category -> slug, $entry -> slug]) }}" class="img radius-7 overflow-hidden img-cover">
                                        <img src="{{ url('storage/'.env('MIX_IMG_ARTICULO_DIR').'/'.$entry -> thumbnail) }}" class="card-img-top" alt="{{ $entry -> title }}">
                                    </a>
                                    <div class="card-body px-0">
                                        <small class="d-block date mt-10 fs-10px fw-bold">
                                            <a href="{{ route('blog-category', $entry -> category -> slug) }}" class="text-uppercase border-end brd-gray pe-3 me-3 color-blue4">{{ $entry -> category -> title }}</a>
                                            <i class="bi bi-clock me-1"></i>
                                            <a class="op-8">{{ \App\Helpers\Front::get_day($entry -> published_at) }} {{ \App\Helpers\Front::get_month($entry -> published_at) }}</a>
                                        </small>
                                        <h5 class="fw-bold mt-10 title">
                                            <a href="{{ route('blog-article', [$entry -> category -> slug, $entry -> slug]) }}">{{ $entry -> title }}</a>
                                        </h5>
                                        <p class="small mt-2 op-8">
                                            {!! $entry -> summary !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('js')
@endpush
