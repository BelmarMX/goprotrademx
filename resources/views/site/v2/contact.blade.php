@extends('site.v2.master.app')

@section('title', 'Contact us')
@section('description', 'Get in contact with us, we will be pleased to talk to you')
@section('image', asset('v1/img/nearshoring.png'))

@section('content')
    <section id="main" class="container mb-5">
        <h1 class="text-center font-bold text-uppercase mb-4">We want to hear about you<br><strong class="gradient">Get in touch with us</strong></h1>

        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('mail.contact') }}" method="post" class="form">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-2">
                                <label for="nombre">Complete name</label>
                                <input name="nombre" class="form-control" type="text" placeholder="John Doe" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-2">
                                <label for="email">Email address</label>
                                <input name="email" class="form-control" type="email" aria-describedby="emailHelp" placeholder="correo@dominio.com" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-2">
                                <label for="celular">Telephone (mobile)</label>
                                <input name="celular" class="form-control" type="text" placeholder="+1 755 555 55 55">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-2">
                                <label for="comentarios">Please, describe your needs or questions</label>
                                <textarea name="comentarios" class="form-control" placeholder="Comments, Suggestions or Question" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <small>By sending this form, you are agree with our <a href="{{ route('privacy-policy') }}">Privacy Policy.</a></small>
                        </div>
                        <div class="col-md-6 offset-md-2 mb-3">
                            <div class="g-recaptcha" data-sitekey="{{ env('APP_ENV') == 'local' ? env('SB_CAPTCHA_PUBLIC') : env('CAPTCHA_PUBLIC') }}"></div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Send form</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="text-center">
                    <img width="206" height="60" src="{{ asset('v1/img/goprotrade_id.png') }}" alt="GoProTradeMX">
                </div>
                <div class="text-end">
                    <strong>hello@goprotrademx.com</strong><br>
                    <strong>+52 1 331 026 0000</strong>
                </div>
            </div>
        </div>
    </section>
@endsection
