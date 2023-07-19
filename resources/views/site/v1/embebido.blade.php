<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app() -> getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- Seo Tags  --}}
        <title>{{ $gallery -> title }}</title>
        {{-- Polyfill --}}
        <script src="{{ asset('js/observer.js') }}"></script>
        <script>IntersectionObserver.prototype.POLL_INTERVAL = 100;</script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cuprum:wght@400;700&family=Montserrat:wght@400;700;800&family=Noto+Serif+Display:wght@400;500;700&display=swap">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/embed.css') }}">
    </head>
    <body>
        <main class="container-fluid">
            <div id="galeria" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($gallery -> elements AS $element)
                        <div class="carousel-item @if($loop -> index == 0) active @endif">
                            @if( $element -> type == 'image' )
                            <img src="{{ url("storage/".env('MIX_IMG_GALERIA_DIR')."/{$element -> image}") }}" class="d-block w-100"
                            alt="-galería de imágenes-">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $element -> title }}</h5>
                                <p>{{ $element -> description }}</p>
                            </div>
                            @elseif($element -> type == 'video')
                                <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{ \App\Helpers\Front::get_yutup_code($element -> url) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @endif
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#galeria" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#galeria" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </main>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
