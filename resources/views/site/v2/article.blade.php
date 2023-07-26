@extends('site.v2.master.app')

@section('title', $record -> title)
@section('description', $record -> summary)
@section('image', url('storage/'.env('MIX_IMG_ARTICULO_DIR').'/'.$record -> image))

@section('content')
    <section id="main" class="container mb-5">
        <div class="text-center mb-3">
            <h1 class="gradient">{{ $record -> title }}</h1>
            <div class="mt-2">
                <a class="blog__summary_category-title text-secondary" href="{{ route('blog-category', $record -> category -> slug) }}">{{ $record -> category -> title }}</a> <span class="pipe">|</span> <span class="blog__summary--date">{{ \App\Helpers\Front::get_day($record -> published_at) }} {{ \App\Helpers\Front::get_month($record -> published_at) }}</span>
            </div>
        </div>
        <div class="text-center mb-5">
            <img width="{{ env('MIX_IMG_ARTICULO_MW') }}" height="{{ env('MIX_IMG_ARTICULO_MH') }}" class="blog__thumb_image img-fluid" src="{{ url('storage/'.env('MIX_IMG_ARTICULO_DIR').'/'.$record -> image) }}" alt="{{ $record -> title }}">
        </div>
        <div class="blog--content">
            {!! $record -> content !!}
        </div>
        <div class="text-end">
            <a class="btn btn-secondary" href="{{ route('blog') }}"><i class="fa-solid fa-arrow-left-long"></i> Return to blog</a>
        </div>
    </section>
@endsection
