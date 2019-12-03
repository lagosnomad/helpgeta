@extends('core::public.master')

@section('title', 'Checkout' . $websiteTitle)
@section('description', '')
@section('ogTitle', 'Checkout' . $websiteTitle)
@section('ogDescription', '')

@section('main')

    <section class="section checkout-wrapper">
        <div class="container">

            <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li class="is-active"><a href="#" aria-current="page">Make a Request</a></li>
                </ul>
            </nav>

            <div class="page-heading">
                <h1 class="title is-3 is-spaced">Make a Request</h1>
            </div>

            <checkout-request :artisan="{{$artisan}}" :ref-category="{{$ref_category}}" :user="{{current_user()}}"></checkout-request>

        </div>
    </section>

@stop