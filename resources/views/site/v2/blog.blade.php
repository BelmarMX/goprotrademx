@extends('site.v2.master.app')

@section('title', 'News')
@section('description', 'A collection of news and published articles of interest in the Trade world!')
@section('image', asset('v1/img/nearshoring.png'))

@section('content')
    <section id="main" class="container mb-5">
        <div class="row">
            <div class="col-md-4">
                <h3>CATEGORIES</h3>
                <ul class="blog__categories_list">
                    @forelse($blog_categories AS $category)
                        <li>
                            <a href="{{ route('blog-category', $category -> slug) }}">{{ $category -> title }}</a>
                        </li>
                    @empty
                        <li>Sin Categorías</li>
                    @endforelse
                </ul>
            </div>
            <div class="col-md-8">
                    @forelse($entries AS $entry)
                        @include('site.v2.partials.blog-article-list', [
                                'category_title'    => $entry -> category -> title
                            ,   'category_link'     => route('blog-category', $entry -> category -> slug)
                            ,   'article_title'     => $entry -> title
                            ,   'article_date'      => $entry -> published_at
                            ,   'article_summary'   => $entry -> summary
                            ,   'article_link'      => route('blog-article', [$entry -> category -> slug, $entry -> slug])
                            ,   'article_image'     => url('storage/'.env('MIX_IMG_ARTICULO_DIR').'/'.$entry -> thumbnail)
                        ])
                    @empty
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                Articles are not available for the moment.
                            </div>
                        </div>
                    </div>
                    @endforelse
                <div class="row">
                    <div class="col-md-12">
                        <div class="pagination style-5 color-4 justify-content-center mt-60">
                            {{ $entries -> render() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
