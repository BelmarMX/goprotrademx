@extends('site.v2.master.app')

@section('title', $record -> title)
@section('description', $record -> summary)
@section('image', url('storage/'.env('MIX_IMG_ARTICULO_DIR').'/'.$record -> image))

@section('content')
    <section id="main" class="container mb-5">
        <div class="text-center mb-3">
            <h1 class="gradient">{{ $record -> title }}</h1>
            <div class="mt-3">
                <a href="{{ route('blog-category', $record -> category -> slug) }}">{{ $record -> category -> title }}</a> | {{ \App\Helpers\Front::get_day($record -> published_at) }} {{ \App\Helpers\Front::get_month($record -> published_at) }}
            </div>
        </div>
        <div class="text-center mb-5">
            <img width="{{ env('MIX_IMG_ARTICULO_MW') }}" height="{{ env('MIX_IMG_ARTICULO_MH') }}" class="img-fluid" src="{{ url('storage/'.env('MIX_IMG_ARTICULO_DIR').'/'.$record -> image) }}" alt="{{ $record -> title }}">
        </div>
        <div class="blog-content">
            {!! $record -> content !!}
        </div>
    </section>
@endsection
