@extends('site.v1.master.app')

{{-- meta tags --}}
@section('title',         $record -> title)
@section('description',   "Artículos en la categoría {$record -> title}")
@isset( $record -> image )
    @section('image', url("storage/".env('MIX_IMG_CATEGORIA_DIR')."/{$record -> image}"))
@else
    @section('image', '')
@endisset

{{-- website contents --}}
@push('css')
@endpush

@section('content')
    <main class="blog-page style-5 color-4">
        <!-- ====== start all-news ====== -->
        <section class="all-news section-padding blog bg-transparent style-3">
            <div class="container">
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-4">
                        <div class="side-blog style-5 pe-lg-5 mt-5 mt-lg-0">
                            <div class="side-categories mb-50">
                                <h6 class="title mb-20 text-uppercase fw-normal">
                                    Categorías
                                </h6>
                                @if( $blog_categories )
                                    @foreach($blog_categories AS $category)
                                        <a href="{{ route('blog-category', $category -> slug) }}" class="cat-item">
                                            <span>{{ $category -> title }}</span>
                                            <span>&nbsp;</span>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        @forelse($entries AS $entry)
                            @include('site.v1.partials.blog-card', [
                                    'link'          => route('blog-article', [$entry -> category -> slug, $entry -> slug])
                                ,   'image'         => url('storage/'.env('MIX_IMG_ARTICULO_DIR').'/'.$entry -> thumbnail)
                                ,   'title'         => $entry -> title
                                ,   'summary'       => $entry -> summary
                                ,   'published'     => $entry -> published_at
                                ,   'category'      => $entry -> category -> title
                                ,   'category_link' => route('blog-category', $entry -> category -> slug)
                            ])
                        @empty
                            <div class="alert alert-warning text-center" role="alert">
                                Lo sentimos, no se encontraron artículos en esta categoría. <a href="{{ route('blog') }}">Regresa al blog</a>
                            </div>
                        @endforelse

                        <div class="pagination style-5 color-4 justify-content-center mt-60">
                            {{ $entries -> render() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end all-news ====== -->
    </main>
@endsection

@push('js')
@endpush
