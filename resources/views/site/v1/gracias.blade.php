@extends('site.v2.master.app')

{{-- meta tags --}}
@section('title',         '¡Envíado con éxito!')
@section('description',   'Has completado tu solicitud de contacto.')
@section('keywords',      '')
@section('image',         '')

{{-- website contents --}}
@push('css')
@endpush

@section('content')
    <main class="container-fluid">
        <div class="row mt-5">
            <section class="col-md-8 offset-md-2">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">¡Enviado con éxito!</h4>
                    <p>Gracias por usar nuestro formulario de contacto para comunicarte con nosotros, revisaremos la información que nos has enviado y daremos seguimiento a tu solicitud.</p>
                    <hr>
                    <p class="mb-0">Pronto tendrás noticias nuestras.</p>
                </div>
            </section>
        </div>

        <hr class="mt-5 mb-5">
    </main>
@endsection

@push('js')
@endpush
