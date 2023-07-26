@extends('site.v2.master.app')

@section('title', "Articles in {$record -> title}")
@section('description', "Articles in {$record -> title}")
@section('image', asset('v1/img/nearshoring.png'))

@section('content')
    <section id="main" class="container mb-5">
        Articles In: <h1 class="gradient">{{ $record  -> title }}</h1>

        <div class="row mt-4">
            <div class="col-md-4">
                <h3>CATEGORIES</h3>
                <ul class="blog__categories_list">
                    @forelse($blog_categories AS $category)
                        <li class="blog__categories_list--item {{ \App\Helpers\Front::is_route("blog/{$category -> slug}") }}">
                            <a href="{{ route('blog-category', $category -> slug) }}">{{ $category -> title }}</a>
                        </li>
                    @empty
                        <li>Sin Categorías</li>
                    @endforelse
                </ul>
            </div>
            <div class="col-md-8">
                <div class="row">
                    @forelse($entries AS $entry)
                        <div class="col">
                            @include('site.v2.partials.blog-article-list', [
                                    'category_title'    => $record -> title
                                ,   'category_link'     => route('blog-category', $record -> slug)
                                ,   'article_title'     => $entry -> title
                                ,   'article_date'      => $entry -> published_at
                                ,   'article_summary'   => $entry -> summary
                                ,   'article_link'      => route('blog-article', [$record -> slug, $entry -> slug])
                                ,   'article_image'     => url('storage/'.env('MIX_IMG_ARTICULO_DIR').'/'.$entry -> thumbnail)
                            ])
                        </div>
                    @empty
                        <div class="alert alert-warning">
                            Articles are not available for the moment in this category.
                        </div>
                    @endforelse

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
