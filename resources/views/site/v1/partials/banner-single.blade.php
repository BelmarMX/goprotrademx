<div class="banner__single">
    @if( isMobile() === true && !empty($slide_mobile) )
        <img width="{{ env('BANNER_WIDTH_MV') }}"
             height="{{ env('BANNER_HEIGHT_MV') }}"
             class="img-fluid w-100 @isset($img_class) {{ $img_class }} @endisset"
             src="{{$slide_mobile}}"
             alt="{{ isset($slide_alt) ? $slide_alt : 'Banner image'}}"
        >
    @else

        >
    @endif
</div>
