<div class="card border-0 bg-transparent rounded-0 border-bottom brd-gray pb-30 mb-30">
    <div class="row">
        <div class="col-lg-5">
            <div class="img img-cover">
                <img src="{{ $image }}" class="radius-7" alt="{{ $title }}">
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card-body p-0">
                <small class="d-block date text">
                    <a href="{{ $category_link }}" class="text-uppercase border-end brd-gray pe-3 me-3 color-blue4 fw-bold">{{ $category }}</a>
                    <i class="bi bi-clock me-1"></i>
                    <a class="op-8">{{ \App\Helpers\Front::get_day($published) }} {{ \App\Helpers\Front::get_month($published) }}</a>
                </small>
                <a href="{{ $link }}" class="card-title mb-10">{{ $title }}</a>
                @if( !is_null($summary) )
                <p class="fs-13px color-666">{!! $summary !!}</p>
                @endif
                <div class="auther-comments d-flex small align-items-center justify-content-between op-9">
                    <div class="l_side d-flex align-items-center">
                        <span class="icon-10 rounded-circle d-inline-flex justify-content-center align-items-center text-uppercase bg-blue4 p-2 me-2 text-white">
                            m
                        </span>
                        <a href="#">
                            <small class="text-muted">Por</small> Moca Soluciones
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
