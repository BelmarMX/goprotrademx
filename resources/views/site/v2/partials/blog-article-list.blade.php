<div class="blog__summary row mb-4">
    <div class="col-md-4">
        <a href="{{ $article_link }}">
            <img width="{{ env('MIX_IMG_ARTICULO_TW') }}" height="{{ env('MIX_IMG_ARTICULO_TH') }}" class="blog__thumb_image img-fluid" src="{{ $article_image }}" alt="{{ $article_title }}">
        </a>
    </div>
    <div class="col-md-8">
        <div>
            <a class="blog__summary_category-title" href="{{ $category_link }}">{{ $category_title }}</a> <span class="pipe">|</span> <span class="blog__summary--date">{{ \App\Helpers\Front::get_day($article_date) }} {{ \App\Helpers\Front::get_month($article_date) }}</span>
        </div>
        <a href="{{ $article_link }}">
            <h3 class="blog__summary--title text-uppercase mb-2">{{ $article_title }}</h3>
            <p class="blog__summary--text small-paragraph-clean">{{ $article_summary }}</p>
        </a>
    </div>
</div>
