@extends('pages::public.master')
@section('page')

    <main id="page-main">
        <div class="page-side-bg"></div>
        <div class="container">
            <div class="page-main-container">
                <div class="page-lead">

                    @include('pages::public._page-banner-section')

                    @include('pages::public._page-content')

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