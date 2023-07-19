@extends('site.v1.master.app')

{{-- meta tags --}}
@section('title',         'Escríbenos')
@section('description',   '')
@section('keywords',      '')
@section('image',         '')

{{-- website contents --}}
@push('css')
@endpush

@section('content')
    <main class="contact-page style-5">
        <!-- ====== start contact page ====== -->
        <section class="community section-padding style-5">
            <div class="container">
                <div class="section-head text-center style-4 mb-40">
                    <small class="title_small">Escríbenos</small>
                    <h2 class="mb-20">Queremos <span> Conocerte</span> </h2>
                    <p>Nos comunicaremos contigo lo más pronto posible</p>
                </div>
                <div class="content rounded-pill">
                    <div class="commun-card">
                        <div class="icon icon-45">
                            <img src="{{ asset('v1/img/icons/mail3d.png') }}" alt="">
                        </div>
                        <div class="inf">
                            <h5>contacto@solucionesmoca.com </h5>
                        </div>
                    </div>
                    <div class="commun-card">
                        <div class="icon icon-45">
                            <img src="{{ asset('v1/img/icons/map3d.png') }}" alt="">
                        </div>
                        <div class="inf">
                            <h5>Guadalajara, Jalisco.</h5>
                        </div>
                    </div>
                    <div class="commun-card">
                        <div class="icon icon-45">
                            <img src="{{ asset('v1/img/icons/msg3d.png') }}" alt="">
                        </div>
                        <div class="inf">
                            <h5>(+52) 33 3390 0219</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact section-padding pt-0 style-6">
            <div class="container">
                <div class="content">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <form action="{{ route('mail.contacto') }}" method="post"class="form">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="email">Correo electrónico</label>
                                            <input name="email" class="form-control" type="email" aria-describedby="emailHelp" placeholder="correo@dominio.com" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="nombre">Nombre completo</label>
                                            <input name="nombre" class="form-control" type="text" placeholder="Nombre(s) Apellido(s)" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="celular">Telefono de contacto a 10 digitos (opcional)</label>
                                            <input name="celular" class="form-control" type="text" placeholder="+52-555-123-4567">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="asunto">Asunto</label>
                                            <input name="asunto" class="form-control" type="text" placeholder="¿Qué tema te interesa?" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-2">
                                            <label for="comentarios">Tus comentarios</label>
                                            <textarea name="comentarios" class="form-control" placeholder="Escribe aquí tus dudas o comentarios" rows="4" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <small>Al enviar este formulario estás aceptando nuestro <a href="{{ route('aviso-privacidad') }}">Aviso de privacidad.</a></small>
                                    </div>
                                    <div class="col-md-6 offset-md-2 mb-3">
                                        <div class="g-recaptcha" data-sitekey="{{ env('APP_ENV') == 'local' ? env('SB_CAPTCHA_PUBLIC') : env('CAPTCHA_PUBLIC') }}"></div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn rounded-pill bg-blue4 fw-bold text-white text-light fs-12px">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <img src="{{ asset('v1/img/icons/contact_a.png') }}" alt="" class="contact_a">
                    <img src="{{ asset('v1/img/icons/contact_message.png') }}" alt="" class="contact_message">
                </div>
            </div>
        </section>
        <!-- ====== end contact page ====== -->
    </main>
@endsection

@push('js')
@endpush
