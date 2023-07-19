@extends('site.v1.master.app')

{{-- meta tags --}}
@section('title',         $record -> title)
@section('description',   $record -> best_text)
@section('image',         url("storage/".env('MIX_IMG_ARTICULO_DIR')."/{$record -> image}"))

{{-- website contents --}}
@push('css')
@endpush

@section('content')
    <main class="blog-page style-5 color-4">

        <!-- ====== start all-news ====== -->
        <section class="all-news section-padding pt-50 blog bg-transparent style-3">
            <div class="container">
                <div class="blog-details-slider mb-100">
                    <div class="section-head text-center mb-60 style-5">
                        <h2 class="mb-20 color-000">{{ $record -> title }}</h2>
                        <small class="d-block date text">
                            <a href="{{ route('blog-category', $record -> category  -> slug) }}" class="text-uppercase border-end brd-gray pe-3 me-3 color-blue4 fw-bold">{{ $record -> category -> title }}</a>
                            <i class="bi bi-clock me-1"></i>
                            <span class="op-8">{{ Carbon\Carbon::parse($record -> created_at) -> format('d/m/Y') }}</span>
                        </small>
                    </div>
                    <div class="content-card">
                        <div class="img">
                            <img src="{{ url("storage/".env('MIX_IMG_ARTICULO_DIR')."/{$record -> image}")  }}" alt="{{ $record -> title }}">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="blog-content-info">
                            {!! $record -> content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end all-news ====== -->

        <!-- ====== start Popular Posts ====== -->
        <section class="popular-posts related Posts section-padding pb-100 bg-gray5">
            <div class="container">
                <h5 class="fw-bold text-uppercase mb-50">Más artículos de interés</h5>
                <div class="related-postes-slider position-relative">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($related AS $entry)
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
        <!-- ====== end Popular Posts ====== -->
    </main>
@endsection

@push('js')
@endpush
