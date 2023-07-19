@if( $banners )
<div id="banner__array" class="@if(Request::is('/')) mb-0 @else mb-5 @endif">
    <div id="banner__slider" class="carousel slide"
         data-bs-ride="carousel"
         data-bs-touch="true"
         data-bs-interval="5500"
    >
        <div class="carousel-inner">
            @foreach($banners AS $banner)
                <div class="carousel-item @if($loop -> index == 0) active @endif">
                    @isset($banner -> link)
                        <a href="{{ $banner -> link }}" target="_blank" class="not-kb">
                    @endisset
                    <img width="{{ env('BANNER_WIDTH') }}"
                         height="{{ env('BANNER_HEIGHT') }}"
                         class="img-fluid w-100 @isset($img_class) {{ $img_class }} @endisset"
                         src="{{ url("storage/".env('MIX_IMG_BANNER_DIR')."/{$banner -> image}") }}"
                         alt="{{$banner -> title ?? 'Banner image'}}"
                    />
                    @isset($banner -> link)
                        </a>
                    @endisset
                    <div class="banner-text">
                        <span class="h2">{{ $banner -> title }}</span>
                        <p>{{ $banner -> description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="banner-float-buttons">
            <a class="btn btn-primary" href="{{ route('escribenos') }}">
                Contáctanos
            </a>
        </div>
        @if( count($banners) > 0 )
            @include('site.v2.partials.banner-indicators', ['target' => '#banner__slider'])
        @endif
    </div>
</div>
@endif
