<div id="bg_pattern">&nbsp;</div>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary pt-0">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img width="206" height="60" src="{{ asset('v1/img/goprotrade_id.png') }}" alt="GoProTradeMX">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div id="main_menu" class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item {{ \App\Helpers\Front::is_route('/') }}">
                        <a class="nav-link {{ \App\Helpers\Front::is_route('/') }}" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item {{ \App\Helpers\Front::is_route('services') }}">
                        <a class="nav-link {{ \App\Helpers\Front::is_route('services') }}" href="{{ route('services') }}">Services</a>
                    </li>
                    <li class="nav-item {{ \App\Helpers\Front::is_route('company') }}">
                        <a class="nav-link {{ \App\Helpers\Front::is_route('company') }}" href="{{ route('company') }}">Company</a>
                    </li>
                    <li class="nav-item {{ \App\Helpers\Front::is_route('blog') }}">
                        <a class="nav-link {{ \App\Helpers\Front::is_route('blog') }}" href="{{ route('blog') }}">News</a>
                    </li>
                    <li class="nav-item {{ \App\Helpers\Front::is_route('contact') }}">
                        <a class="nav-link {{ \App\Helpers\Front::is_route('contact') }}" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
                <div>
                    <span class="elissir">We can help you</span>
                    <a class="link_icon gray" href="mailto:hello@goprotrademx.com" target="_blank" data-bs-toggle="tooltip" title="email"><i class="bi bi-envelope"></i></a>
                    <a class="link_icon gray" href="https://wa.me/+521" target="_blank" data-bs-toggle="tooltip" title="whatsapp"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
        </div>
    </nav>
</header>

@include('site.v2.master.banner')
