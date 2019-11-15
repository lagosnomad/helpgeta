@extends('core::public.master')

@section('title', 'Checkout' . $websiteTitle)
@section('description', '')
@section('ogTitle', 'Checkout' . $websiteTitle)
@section('ogDescription', '')

@section('main')

    <main id="page-main" class="artisan-single-wrapper">
        <div class="page-side-bg"></div>
        <div class="container">
            <div class="page-main-container">
                <div class="page-lead">

                    <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li class="is-active"><a href="#" aria-current="page">Make a Request</a></li>
                        </ul>
                    </nav>

                    <div class="page-heading">
                        <h2 class="title is-3 is-spaced">Make a Request</h2>
                    </div>

                    <checkout-request :artisan="{{$artisan}}" :category="{{$category}}"></checkout-request>


                </div>
                <div class="page-side">
                    @include('pages::public._widget-categories')
                    @include('pages::public._widget-contact')
                    @include('pages::public._widget-newsletter')
                </div>
            </div>
        </div>
    </main>

@stop