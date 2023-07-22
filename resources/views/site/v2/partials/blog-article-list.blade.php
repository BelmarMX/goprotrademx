<div class="row">
    <div class="col-md-4">
        <a href="{{ $article_link }}">
            <img width="{{ env('MIX_IMG_ARTICULO_TW') }}" height="{{ env('MIX_IMG_ARTICULO_TH') }}" class="img-fluid" src="{{ $article_image }}" alt="{{ $article_title }}">
        </a>
    </div>
    <div class="col-md-8">
        <div>
            <a href="{{ $category_link }}">{{ $category_title }}</a> | {{ \App\Helpers\Front::get_day($article_date) }} {{ \App\Helpers\Front::get_month($article_date) }}
        </div>
        <a href="{{ $article_link }}">
            <h3 class="text-uppercase">{{ $article_title }}</h3>
            <p class="small-paragraph-clean">{{ $article_summary }}</p>
        </a>
    </div>
</div>
