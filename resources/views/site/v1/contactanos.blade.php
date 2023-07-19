@extends('site.v2.master.app')

{{-- meta tags --}}
@section('title',         'Contáctanos')
@section('description',   '')
@section('keywords',      '')
@section('image',         '')

{{-- website contents --}}
@push('css')
@endpush

@section('content')
    <main class="container-fluid">
        <h1>@yield('title')</h1>
    </main>
@endsection

@push('js')
@endpush
