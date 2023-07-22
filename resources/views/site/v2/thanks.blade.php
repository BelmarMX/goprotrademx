@extends('site.v2.master.app')

@section('title', 'Successfully Sent')
@section('description', 'Thanks for getting in touch')
@section('image', '')

@section('content')
    <section id="main" class="container mb-5">
        <div class="row mt-5">
            <section class="col-md-8 offset-md-2">
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">¡Successfully sent!</h4>
                    <p>Thank you for getting in touch with us, you will receive an answer soon.</p>
                </div>
            </section>
        </div>

        <hr class="mt-5 mb-5">
    </section>
    <div id="featured" class="d-flex justify-content-center align-items-center my-5">
        <div class="star">
            <p class="text-center">
                You can trust our People, Expertise and Services to Simplify your Customs and Logistics Processes.<br>
                <strong>Free your resources to focus in your core business</strong>
            </p>
        </div>
    </div>
@endsection
